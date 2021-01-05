<?php

namespace Rayblair\TestDeliverable;

use Illuminate\Support\ServiceProvider;
use Rayblair\TestDeliverable\Commands\TestDeliverableCommand;

class TestDeliverableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'test-deliverable');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'test-deliverable');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('test-deliverable.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/test-deliverable'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/test-deliverable'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/test-deliverable'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                TestDeliverableCommand::class
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'test-deliverable');

        // Register the main class to use with the facade
        $this->app->singleton('test-deliverable', function () {
            return new TestDeliverable;
        });
    }
}
