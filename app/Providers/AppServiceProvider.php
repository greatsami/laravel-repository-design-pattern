<?php

namespace App\Providers;

use App\Repositories\AuthenticationRepository;
use App\Repositories\AuthenticationRepositoryInterface;
use App\Repositories\BlogPostRepository;
use App\Repositories\BlogPostRepositoryInterface;
use Dedoc\Scramble\Scramble;
use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BlogPostRepositoryInterface::class, BlogPostRepository::class);
        $this->app->bind(AuthenticationRepositoryInterface::class, AuthenticationRepository::class);

        Scramble::routes(function (Route $route) {
            return Str::startsWith($route->uri, 'api/');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
