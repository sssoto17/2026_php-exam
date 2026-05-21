<?php

declare(strict_types=1);

namespace Framework\Template;

use \DateTime;
use DateTimeInterface;
use League\Plates\Engine;

class Renderer implements RendererInterface {

    public function render(string $template, array $data = []): string {
        $engine = new Engine(dirname(__DIR__, 3) . "/views");

        $engine->addFolder("globals", dirname(__DIR__, 3) . "/views/components/global");
        $engine->addFolder("user", dirname(__DIR__, 3) . "/views/components/user");
        $engine->addFolder("gallery", dirname(__DIR__, 3) . "/views/components/gallery");

        return $engine->render($template, $data);
    }
}