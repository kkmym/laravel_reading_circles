<?php

namespace MyApp\ReadingCircles\Application\Providers;

use MyApp\ReadingCircles\Application\Auth\RCGuard;
use Illuminate\Support\ServiceProvider;
use MyApp\ReadingCircles\Domain\Models\MemberRepositoryInterface;
use MyApp\ReadingCircles\Infrastructure\Repositories\MemberRepository;
use MyApp\ReadingCircles\Domain\Models\BookRepositoryInterface;
use MyApp\ReadingCircles\Infrastructure\Repositories\BookRepository;

class MyAppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app['auth']->extend('rcmember_guard', function($app, $name, array $config) {
            return $this->app->make(RCGuard::class);
        });
    }

    public function register()
    {
        $this->app->bind(MemberRepositoryInterface::class, MemberRepository::class);
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
    }
}