<?php

namespace Helix\Providers;

use Config;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

use Laravel\Scout\EngineManager;
use AlgoliaSearch\Client as Algolia;
use AlgoliaSearch\Version as AlgoliaUserAgent;
use Helix\Engines\AdvancedAlgoliaEngine;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        resolve(EngineManager::class)->extend('advancedalgolia', function () {

            AlgoliaUserAgent::$custom_value = '; Laravel Scout (custom driver)';

            return new AdvancedAlgoliaEngine(new Algolia(
                config('scout.algolia.id'), config('scout.algolia.secret')
            ));

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
