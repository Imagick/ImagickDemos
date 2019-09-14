<?php

declare(strict_types=1);

namespace ImagickDemo\ResponseMapper;

use Psr\Http\Message\ResponseInterface;
use SlimAuryn\Response\TwigResponse;
use Twig\Environment as Twig;

class TwigResponseMapper
{
    /** @var Twig */
    private $twig;

    /**
     * TwigResponseMapper constructor.
     * @param Twig $twig
     */
    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(
        TwigResponse $twigResponse,
        ResponseInterface $originalResponse
    ) : ResponseInterface {
        $html = $this->twig->render(
            $twigResponse->getTemplateName(),
            $twigResponse->getParameters()
        );

        $status = $twigResponse->getStatus();
        $reasonPhrase = $this->getCustomReasonPhrase($status);

        $response = $originalResponse->withStatus($status, $reasonPhrase);
        foreach ($twigResponse->getHeaders() as $key => $value) {
            $response = $response->withAddedHeader($key, $value);
        }
        $response->getBody()->write($html);

        return $response;
    }

    public function getCustomReasonPhrase(int $status)
    {
        $customStatusReasons = [
            420 => 'Enhance Your Calm',
        ];

        return $customStatusReasons[$status] ?? '';
    }
}
