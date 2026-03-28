<?php

namespace Engelsystem\EventSpecific;

use Engelsystem\Container\ServiceProvider as BaseServiceProvider;
use Engelsystem\Helpers\Translation\Translator as EngelsystemTranslator;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->alias(Translator::class, EngelsystemTranslator::class);
    }
}
