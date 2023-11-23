<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Domain\Repositories\MovieRepositoryInterface;
use Infrastructure\Repositories\MovieRepository;
use Presentation\Http\Services\ValidatorService;
use Presentation\Http\Interfaces\ValidatorServiceInterface;
use Presentation\Http\Adapter\CommandAdapter;
use Presentation\Http\Interfaces\CommandAdapterInterface;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ValidatorServiceInterface::class,
            ValidatorService::class
        );

        $this->app->bind(
            CommandAdapterInterface::class,
            CommandAdapter::class
        );

        $this->app->bind(
            MovieRepositoryInterface::class,
            MovieRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
