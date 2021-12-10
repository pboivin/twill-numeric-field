<?php

namespace PBoivin\TwillNumericInput;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->loadViews();

        $this->publishAssets();
    }

    private function loadViews()
    {
        $path = __DIR__ . '/../resources/views';

        $this->loadViewsFrom($path, 'twill-numeric-input');

        $this->publishes(
            [$path => resource_path('views/vendor/twill-numeric')],
            'views'
        );
    }

    private function publishAssets()
    {
        $path = __DIR__ . '/../resources/assets/js/components';

        $this->publishes(
            [$path => resource_path(config('twill.vendor_components_resource_path'))],
            'components'
        );
    }
}
