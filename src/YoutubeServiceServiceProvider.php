<?php

namespace Trinhnk\YoutubeService;

use Illuminate\Support\ServiceProvider;

class YoutubeServiceServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'trinhnk');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'trinhnk');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/youtubeservice.php', 'youtubeservice');

        // Register the service the package provides.
        $this->app->singleton('youtubeservice', function ($app) {
            return new YoutubeService;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['youtubeservice'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/youtubeservice.php' => config_path('youtubeservice.php'),
        ], 'youtubeservice.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/trinhnk'),
        ], 'youtubeservice.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/trinhnk'),
        ], 'youtubeservice.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/trinhnk'),
        ], 'youtubeservice.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
