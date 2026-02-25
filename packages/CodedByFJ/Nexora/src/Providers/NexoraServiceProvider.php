<?php

namespace CodedByFJ\Nexora\Providers;

use Illuminate\Support\ServiceProvider;

class NexoraServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/config.php',
            'nexora'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/menu.php',
            'menu.admin'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/acl.php',
            'acl'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/system.php',
            'core'
        );

        $this->app->concord->registerModel(
            \CodedByFJ\Nexora\Contracts\PageLayout::class,
            \CodedByFJ\Nexora\Models\PageLayout::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/admin.php');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'nexora');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'nexora');

        $this->publishes([
            __DIR__ . '/../Config/config.php' => config_path('nexora.php'),
        ], 'nexora-config');

        $this->publishes([
            __DIR__ . '/../Resources/assets' => public_path('vendor/codedbyfj/nexora'),
        ], 'nexora-assets');

        // Prepend namespace for shop theme overrides
        $this->app->booted(function () {
            view()->prependNamespace('shop', realpath(__DIR__ . '/../Resources/views/shop'));
        });
    }
}
