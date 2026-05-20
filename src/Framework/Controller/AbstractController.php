<?php

declare(strict_types=1);

namespace Framework\Controller;

use DI\Attribute\Inject;
use Framework\Template\RendererInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;

abstract class AbstractController {
    #[Inject] private ResponseFactoryInterface $factory;
    #[Inject] private StreamFactoryInterface $streamer;
    #[Inject] private RendererInterface $renderer;

    protected function render(string $template, array $data = []): ResponseInterface {
        $content = $this->renderer->render($template, $data);

        $stream = $this->streamer->createStream($content);
        $response = $this->factory->createResponse(200)->withBody($stream);

        return $response;
    }

    protected function redirect(string $path): ResponseInterface {
        $response = $this->factory->createResponse(302);
        $response = $response->withHeader("Location", $path);

        return $response;
    }
}