<?php

namespace App\Providers;
use App\Services\CircleCalService;
use App\Services\GeometryContract;
use App\Services\TriangleCalService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

        // $this->app->bind(CircleCalService::class, function ($ap){
        //     return new CircleCalService();
        // });

        $this->app->singleton(GeometryContract::class, function ($app){
            if(request()->get('shape') === 'circle'){
                return new CircleCalService();
            }
            return new TriangleCalService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
