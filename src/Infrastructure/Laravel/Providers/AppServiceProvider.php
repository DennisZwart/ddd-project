<?php

namespace Src\Infrastructure\Laravel\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $reflection = new \ReflectionClass($this->app);
        $namespaceProperty = $reflection->getProperty('namespace');
        $namespaceProperty->setAccessible(true);
        $namespaceProperty->setValue($this->app, 'Src\\');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
