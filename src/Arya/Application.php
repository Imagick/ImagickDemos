<?php

namespace Arya;

use Auryn\Injector,
    Auryn\Provider,
    Auryn\InjectionException,
    Arya\Sessions\Session,
    FastRoute\Dispatcher,
    FastRoute\RouteCollector;

class Application {

    private $injector;
    private $request;
    private $response;
    private $routes = [];

    private $befores = [];
    private $afters = [];
    private $finalizers = [];

    private $canSerializeRoutes = TRUE;

    private $options = [
        'app.debug' => NULL,
        'app.auto_reason' => TRUE,
        'app.allow_empty_response' => FALSE,
        'app.auto_urldecode' => TRUE,
        'routing.cache_file' => NULL,
        'session.strict' => TRUE,
        'session.class' => 'Arya\\Sessions\\FileSessionHandler',
        'session.cookie_name' => 'ARYASESSID',
        'session.cookie_domain' => '',
        'session.cookie_path' => '',
        'session.cookie_secure' => FALSE,
        'session.cookie_httponly' => TRUE,
        'session.entropy_length' => 1024,
        'session.entropy_file' => NULL,
        'session.hash_function' => NULL,
        'session.cache_limiter' => Session::CACHE_NOCACHE,
        'session.cache_expire' => 180,
        'session.gc_probability' => 1,
        'session.gc_divisor' => 100,
        'session.gc_max_lifetime' => 1440,
        'session.middleware_priority' => 20,
        'session.referer_check' => '',
        'session.save_path' => NULL
    ];

    public function __construct(Injector $injector = NULL, $debug = NULL) {
        $this->injector = $injector ?: new Provider;

        if (isset($debug)) {
            $debug = (bool) $debug;
        } elseif (defined('DEBUG')) {
            $debug = (bool) DEBUG;
        } else {
            $debug = TRUE;
        }

        $this->options['app.debug'] = $debug;
        $this->options['routing.cache_file'] = __DIR__ . '/../var/routes.cache';
    }

    /**
     * Add a route handler
     *
     * @param string $httpMethod
     * @param string $uri
     * @param mixed $handler
     * @return Application Returns the current object instance
     */
    public function route($httpMethod, $uri, $handler) {
        $this->routes[] = [$httpMethod, $uri, $handler];
        if($this->canSerializeRoutes) {
            if($handler instanceof \Closure) {
                $this->canSerializeRoutes = FALSE;
            }
        }

        return $this;
    }

    /**
     * Attach a "before" middleware
     *
     * @param mixed $middleware
     * @param array $options
     * @return Application Returns the current object instance
     */
    public function before($middleware, array $options = []) {
        $this->befores[] = $this->generateMiddlewareComponents($middleware, $options);

        return $this;
    }

    private function generateMiddlewareComponents($middleware, array $options) {
        $methodFilter = empty($options['method']) ? NULL : $options['method'];
        $uriFilter = empty($options['uri']) ? NULL : $options['uri'];
        $priority = isset($options['priority']) ? @intval($options['priority']) : 50;

        return [$middleware, $methodFilter, $uriFilter, $priority];
    }

    /**
     * Attach an "after" middleware
     *
     * @param mixed $middleware
     * @param array $options
     * @return Application Returns the current object instance
     */
    public function after($middleware, array $options = []) {
        $this->afters[] = $this->generateMiddlewareComponents($middleware, $options);

        return $this;
    }

    /**
     * Attach a "finalize" middleware
     *
     * @param mixed $middleware
     * @param array $options
     * @return Application Returns the current object instance
     */
    public function finalize($middleware, array $options = []) {
        $this->finalizers[] = $this->generateMiddlewareComponents($middleware, $options);

        return $this;
    }

    /**
     * Respond to the client request
     *
     * The run method allows users to inject their own Arya\Request instance (which can be useful
     * for testing). Most use-cases should leave the parameter unassigned as Arya will auto-generate
     * the request automatically if not specified.
     *
     * @param Request $request The request environment
     * @return void
     */
    public function run(Request $request = NULL) {
        $request = $request ?: $this->generateRequest();
        $response = new Response;

        if ($this->options['app.auto_urldecode']) {
            $request['REQUEST_URI'] = urldecode($request['REQUEST_URI']);
            $request['REQUEST_URI_PATH'] = urldecode($request['REQUEST_URI_PATH']);
        }

        $this->request = $request;
        $this->response = $response;

        $this->injector->share($request);
        $this->injector->share($response);
        $this->injector->share('Arya\Sessions\SessionMiddlewareProxy');
        $this->injector->alias('Arya\Sessions\Session', 'Arya\Sessions\SessionMiddlewareProxy');
        $this->injector->delegate('Arya\Sessions\SessionMiddlewareProxy', function() use ($request) {
            return $this->buildSessionMiddleware($request);
        });

        $middlewareSort = [$this, 'middlewareSort'];
        usort($this->befores, $middlewareSort);

        ob_start();

        if (!$this->doMiddleware($this->befores)) {
            $this->routeRequest();
        }

        // We specifically sort these after handler invocation so that session middleware
        // added during session instantiation can be dynamically prioritized. This isn't
        // strictly necessary but if we sorted these before the request it wouldn't be possible
        // to let users change session middleware priority.
        usort($this->afters, $middlewareSort);
        usort($this->finalizers, $middlewareSort);

        $this->doMiddleware($this->afters);

        $bufferedOutput = ob_get_clean();

        if (isset($bufferedOutput[0])) {
            $this->applyOutputErrorResponse($bufferedOutput);
        }

        $this->sendResponse();
    }

    private function buildSessionMiddleware(Request $request) {
        $handler = $this->injector->make($this->options['session.class']);
        $priority = $this->options['session.middleware_priority'];
        $session = new Sessions\SessionMiddlewareProxy($this, $request, $handler, $priority);

        $options = $this->options;

        unset(
            $options['session.middleware_priority'],
            $options['session.class'],
            $options['session.save_path']
        );

        $sessionOptions = [];
        foreach ($options as $option => $value) {
            if (stripos($option, 'session.') === 0) {
                $option = substr($option, 8);
                $sessionOptions[$option] = $value;
            }
        }

        $session->setAllOptions($sessionOptions);

        return $session;
    }

    private function loadRouter() {
        $callable = function(RouteCollector $r) {
            foreach ($this->routes as $routeStruct) {
                list($httpMethod, $uri, $handler) = $routeStruct;
                $r->addRoute($httpMethod, $uri, $handler);
            }
        };

        return $this->canSerializeRoutes
            ? \FastRoute\cachedDispatcher($callable, [
                'cacheFile' => $this->options['routing.cache_file'],
                'cacheDisabled' => $this->options['app.debug']
            ])
            : \FastRoute\simpleDispatcher($callable);
    }

    private function generateRequest() {
        $_input = empty($_SERVER['CONTENT-LENGTH']) ? NULL : fopen('php://input', 'r');

        return new Request($_SERVER, $_GET, $_POST, $_FILES, $_COOKIE, $_input);
    }

    private function middlewareSort(array $a, array $b) {
        $a = end($a);
        $b = end($b);

        if ($a == $b) {
            $result = 0;
        } else {
            $result = ($a < $b) ? -1 : 1;
        }

        return $result;
    }

    private function doMiddleware(array $middleware) {
        $shouldStop = FALSE;
        foreach ($middleware as $middlewareStruct) {
            if ($this->applyMiddleware($middlewareStruct)) {
                $shouldStop = TRUE;
                break;
            }
        }

        return $shouldStop;
    }

    private function applyMiddleware(array $middlewareStruct) {
        list($executableMiddleware, $methodFilter, $uriFilter) = $middlewareStruct;

        if ($methodFilter && $this->request['REQUEST_METHOD'] !== $methodFilter) {
            $shouldStop = FALSE;
        } elseif ($uriFilter && !$this->matchesUriFilter($uriFilter, $this->request['REQUEST_URI'])) {
            $shouldStop = FALSE;
        } else {
            $shouldStop = $this->tryMiddleware($executableMiddleware);
        }

        return $shouldStop;
    }

    private function matchesUriFilter($uriFilter, $uriPath) {
        if ($uriFilter === $uriPath) {
            $isMatch = TRUE;
        } elseif ($uriFilter[strlen($uriFilter) - 1] === '*'
            && strpos($uriPath, substr($uriFilter, 0, -1)) === 0
        ) {
            $isMatch = TRUE;
        } else {
            $isMatch = FALSE;
        }

        return $isMatch;
    }

    private function tryMiddleware($executableMiddleware) {
        try {
            $shouldStop = $this->injector->execute($executableMiddleware, [
                ':request' => $this->request,
                ':response' => $this->response,
            ]);

            if ($shouldStop && $shouldStop !== TRUE) {
                throw new \RuntimeException(
                    sprintf('Middleware returned invalid type: %s', gettype($shouldStop))
                );
            }

        } catch (InjectionException $error) {
            $shouldStop = TRUE;
            $this->applyExceptionResponse(new \RuntimeException(
                $msg = 'Middleware injection failure',
                $code = 0,
                $error
            ));
        } catch (\Exception $error) {
            $shouldStop = TRUE;
            $this->applyExceptionResponse(new \RuntimeException(
                $msg = 'Middleware execution threw an uncaught exception',
                $code = 0,
                $error
            ));
        }

        return $shouldStop;
    }

    private function applyExceptionResponse(\Exception $e) {
        $this->response->importArray([
            'status' => 500,
            'body' => $this->generateExceptionBody($e)
        ]);
    }

    private function generateExceptionBody(\Exception $e) {
        $msg = $this->options['app.debug']
            ? "<pre style=\"color:red\">{$e}</pre>"
            : '<p>Something went terribly wrong!</p>';

        return "<html><body><h1>500 Internal Server Error</h1><hr/>{$msg}</body></html>";
    }

    private function applyOutputErrorResponse($buffer) {
        $msg = $this->options['app.debug']
            ? "<pre style=\"color:red\">{$buffer}</pre>"
            : '<p>Something went terribly wrong!</p>';

        $body = "<html><body><h1>500 Internal Server Error</h1><hr/>{$msg}</body></html>";

        $this->response->importArray([
            'status' => 500,
            'body' => $body
        ]);
    }

    private function routeRequest() {
        try {
            $method = $this->request['REQUEST_METHOD'];
            $uriPath = $this->request['REQUEST_URI_PATH'];

            $router = $this->loadRouter();
            $routingResult = $router->dispatch($method, $uriPath);

            switch ($routingResult[0]) {
                case Dispatcher::FOUND:
                    $handler = $routingResult[1];
                    $routeArgs = $routingResult[2];
                    $this->dispatchFoundRoute($handler, $routeArgs);
                    break;
                case Dispatcher::NOT_FOUND:
                    $this->applyNotFoundResponse();
                    break;
                case Dispatcher::METHOD_NOT_ALLOWED:
                    $allowedMethods = $routingResult[1];
                    $this->applyMethodNotAllowedResponse($allowedMethods);
                    break;
                default:
                    throw new \UnexpectedValueException(
                        sprintf('Unknown route dispatcher status code: %s', $routingResult[0])
                    );
            }
        } catch (UserInputException $e) {
            $this->applyBadUserInputResponse($e->getMessage());
        } catch (InjectionException $e) {
            $this->applyExceptionResponse(new \RuntimeException(
                $msg = 'Route handler injection failure',
                $code = 0,
                $prev = $e
            ));
        } catch (\Exception $e) {
            $this->applyExceptionResponse($e);
        }
    }

    private function dispatchFoundRoute($handler, array $routeArgs) {
        $this->request['ROUTE_ARGS'] = $routeArgs;

        $injectionLiterals = [
            ':request' => $this->request,
            ':response' => $this->response
        ];

        if ($routeArgs) {
            foreach ($routeArgs as $key => $value) {
                $injectionLiterals[":{$key}"] = $value;
            }
        }

        $result = $this->injector->execute($handler, $injectionLiterals);

        if ($result instanceof Response) {
            $this->response = $result;
            $this->injector->share($result);
        } elseif (is_array($result)) {
            $this->response->importArray($result);
        } elseif ($result) {
            $this->response->setBody($result);
        }
    }

    private function applyNotFoundResponse() {
        $this->response->importArray([
            'status' => 404,
            'body' => '<html><body><h1>404 Not Found</h1></body></html>'
        ]);
    }

    private function applyMethodNotAllowedResponse(array $allowedMethods) {
        $this->response->importArray([
            'status' => 405,
            'headers' => ['Allow: ' . implode(',', $allowedMethods)],
            'body' => '<html><body><h1>405 Method Not Allowed</h1></body></html>'
        ]);
    }

    private function applyBadUserInputResponse($errorMessage) {
        $reason = 'Bad Input Parameter';
        $errorMessage = $errorMessage ?: 'Invalid form or query parameter input';
        $this->response->importArray([
            'status' => 400,
            'reason' => $reason,
            'body' => "<html><body><h1>400 {$reason}</h1><p>{$errorMessage}</p></body></html>"
        ]);
    }

    private function sendResponse() {
        if ($nativeHeaders = headers_list()) {
            foreach ($nativeHeaders as $line) {
                $this->response->addHeaderLine($line);
            }
        }

        $statusCode = $this->response->getStatus();
        $reason = $this->response->getReasonPhrase();
        if ($this->options['app.auto_reason'] && empty($reason)) {
            $reasonConstant = "Arya\\Reason::HTTP_{$statusCode}";
            $reason = defined($reasonConstant) ? constant($reasonConstant) : '';
            $this->response->setReasonPhrase($reason);
        }

        $statusLine = sprintf("HTTP/%s %s", $this->request['SERVER_PROTOCOL'], $statusCode);
        if (isset($reason[0])) {
            $statusLine .= " {$reason}";
        }

        header_remove();
        header($statusLine);

        foreach ($this->response->getAllHeaderLines() as $headerLine) {
            header($headerLine, $replace = FALSE);
        }

        flush(); // Force header output

        $body = $this->response->getBody();

        if (is_string($body)) {
            echo $body;
        } elseif (is_callable($body)) {
            $this->outputCallableBody($body);
        }
    }

    private function outputCallableBody(callable $body) {
        try {
            $body();
        } catch (\Exception $e) {
            $this->outputManualExceptionResponse($e);
        }
    }

    private function outputManualExceptionResponse(\Exception $e) {
        if (!headers_sent()) {
            header_remove();
            $protocol = $this->request['SERVER_PROTOCOL'];
            header("HTTP/{$protocol} 500 Internal Server Error");
            echo $this->generateExceptionBody($e);
        }
    }

    private function applyFinalizers($middleware) {
        try {
            $this->injector->execute($middleware, []);
        } catch (\Exception $e) {
            error_log($e->__toString());
        }
    }

    /**
     * Retrieve an application option setting
     *
     * @param string $option
     * @throws \DomainException
     * @return mixed
     */
    public function getOption($option) {
        if (array_key_exists($option, $this->options)) {
            return $this->options[$option];
        } else {
            throw new \DomainException(
                sprintf('Unknown option: %s', $option)
            );
        }
    }

    /**
     * Set multiple application options
     *
     * @param array $options
     * @throws \DomainException
     * @return Application Returns the current object instance
     */
    public function setAllOptions(array $options) {
        foreach ($options as $option => $value) {
            $this->setOption($option, $value);
        }

        return $this;
    }

    /**
     * Set an application option
     *
     * @param string $option
     * @param mixed $value
     * @throws \DomainException
     * @return Application Returns the current object instance
     */
    public function setOption($option, $value) {
        if (array_key_exists($option, $this->options)) {
            $this->assignOptionValue($option, $value);
        } else {
            throw new \DomainException(
                sprintf('Unknown option: %s', $option)
            );
        }

        return $this;
    }

    private function assignOptionValue($option, $value) {
        switch ($option) {
            case 'session.class':
                $this->setSessionClass($value);
                break;
            case 'session.save_path':
                $this->setSessionSavePath($value);
                break;
            default:
                $this->options[$option] = $value;
        }
    }

    private function setSessionClass($value) {
        if (!is_string($value)) {
            throw new \InvalidArgumentException(
                'session.class must be a string'
            );
        } elseif (!class_exists($value)) {
            throw new \LogicException(
                sprintf('session.class does not exist and could not be autoloaded: %s', $value)
            );
        } else {
            $this->options['session.class'] = $value;
            $this->injector->alias('Arya\Sessions\SessionHandler', $value);
        }
    }

    private function setSessionSavePath($value) {
        if (!is_string($value)) {
            throw new \InvalidArgumentException(
                sprintf('session.class requires a string; %s provided', gettype($value))
            );
        } elseif (!(is_dir($value) && is_writable($value))) {
            throw new \InvalidArgumentException(
                sprintf('session.save_path requires a writable directory path: %s', $value)
            );
        } else {
            $this->options['session.save_path'] = $value;
            $this->injector->define('Arya\Sessions\FileSessionHandler', [
                ':dir' => $value
            ]);
        }
    }

}
