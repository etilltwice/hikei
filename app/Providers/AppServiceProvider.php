<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Resource::withoutWrapping();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (app()->isLocal() || app()->runningUnitTests()) {
            // faker japanese
            $this->app->singleton(\Faker\Generator::class, function () {
                return \Faker\Factory::create('ja_JP');
            });
        }
    }
}
