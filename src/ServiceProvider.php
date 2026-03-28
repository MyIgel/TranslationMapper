<?php

declare(strict_types=1);

namespace Engelsystem\Plugins\TranslationMapper;

use Engelsystem\Application;
use Engelsystem\Container\ServiceProvider as BaseServiceProvider;
use Engelsystem\Helpers\Translation\Translator as EngelsystemTranslator;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->app->extend(EngelsystemTranslator::class, function (EngelsystemTranslator $service, Application $app) {
            return new Translator($service);
        });
    }
}
