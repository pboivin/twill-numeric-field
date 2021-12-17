<?php

namespace PBoivin\TwillNumericInput;

use A17\Twill\PackageServiceProvider;

class ServiceProvider extends PackageServiceProvider
{
    public function register()
    {
        $this->registerVueComponentsDirectory(__DIR__ . '/../resources/assets/js/components');

        $this->registerBlocksDirectory(__DIR__ . '/../resources/views/admin/blocks');

        $this->registerRepeatersDirectory(__DIR__ . '/../resources/views/admin/repeaters');

        $this->loadViews();
    }

    public function boot()
    {
    }

    private function loadViews()
    {
        $path = __DIR__ . '/../resources/views';

        $this->loadViewsFrom($path, 'twill-numeric-input');

        $this->publishes(
            [$path => resource_path('views/vendor/twill-numeric-input')],
            'views'
        );
    }
}
