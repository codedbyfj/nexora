<?php

namespace Webkul\BagistoNova\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class BagistoNovaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/config.php',
            'bagisto-nova'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/menu.php',
            'menu.admin'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/acl.php',
            'acl'
        );

        $this->app->concord->registerModel(
            \Webkul\BagistoNova\Contracts\PageLayout::class,
            \Webkul\BagistoNova\Models\PageLayout::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/admin.php');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'nova');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'nova');

        $this->publishes([
            __DIR__ . '/../Config/config.php' => config_path('bagisto-nova.php'),
        ], 'nova-config');

        $this->publishes([
            __DIR__ . '/../Resources/assets' => public_path('vendor/webkul/bagisto-nova'),
        ], 'nova-assets');

        // Prepend namespace for shop theme overrides
        $this->app->booted(function () {
            view()->prependNamespace('shop', realpath(__DIR__ . '/../Resources/views/shop'));
        });
    }
}
