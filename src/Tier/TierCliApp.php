<?php

namespace Tier;

use Auryn\Injector;
use Arya\Request;
use Arya\Response;
use Arya\Body as ResponseBody;

class TierCliApp
{
    /**
     * @var Tier[]
     */
    private $tiers = [];

    private $tierCount = 0;

    public $maxInternalExecutes = 10;

    private $preCallables = [];

    private $postCallables = [];
    
    private $initialInjectionParams = null;

    public function __construct(Tier $tier, InjectionParams $injectionParams = null)
    {
        $this->tiers[] = $tier;
        $this->initialInjectionParams = $injectionParams;
    }

    public function addTier(Tier $tier)
    {
        $this->tiers[] = $tier;
    }

    // This can't be type-hinted as callable as we allow instance methods
    // on uncreated classes.
    public function addPreCallable($callable)
    {
        $this->preCallables[] = $callable;
    }

    // This can't be type-hinted as callable as we allow instance methods
    // on uncreated classes.
    public function addPostCallable($callable)
    {
        $this->postCallables[] = $callable;
    }

    public function execute(Request $request)
    {
        // Create and share these as they need to be the same
        // across the application
        $injector = new Injector();
        $response = new Response;
        $injector->share($request);
        $injector->share($response);
        $injector->share($injector); //yolo

        $this->initialInjectionParams->addToInjector($injector);

        foreach ($this->preCallables as $preCallable) {
            $injector->execute($preCallable);
        }

        while (true) {
            if ($this->tierCount >= count($this->tiers)) {
                throw new TierException("No more Tiers to execute");
            }

            $tier = $this->tiers[$this->tierCount];

            //Check we haven't got caught in a redirect loop
            $this->tierCount++;
            if ($this->tierCount > $this->maxInternalExecutes) {
                throw new TierException("Too many tiers");
            }

            // Setup the information created by the previous Tier
            if (($injectionParams = $tier->getInjectionParams())) {
                $injectionParams->addToInjector($injector);
            }

            // If the next Tier has a setup function, call it
            $setupCallable = $tier->getSetupCallable();
            if ($setupCallable) {
                $injector->execute($setupCallable);
            }

            // Call this Tier's callable
            $result = $injector->execute($tier->getTierCallable());

            // If it's a responseBody send it
            if ($result instanceof ResponseBody) {
                $response->setBody($result);
                
                sendResponse($request, $response);
                break;
            } // If it's a new Tier to run, setup the next loop.
            else if ($result instanceof Tier) {
                $this->tiers[] = $result;
            }
            else if (is_array($result)) {
                //It's an array of tiers to run.
                foreach ($result as $tier) {
                    if (!$tier instanceof Tier) {
                        throw new TierException("A tier must return either a responsebody, a new Tier or an Array of Tiers");
                    }
                    $this->tiers[] = $tier;
                }
            } // Otherwise it's an error
            else if ($result == false) {
                // The executed tier wasn't able to handle it e.g. a caching layer
                // There should be another tier to execute.
            }
            else {
                throwWrongTypeException($result);
            }
        }

        foreach ($this->postCallables as $postCallable) {
            $injector->execute($postCallable);
        }
    }
}
