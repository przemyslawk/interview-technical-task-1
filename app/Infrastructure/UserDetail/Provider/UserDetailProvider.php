<?php

namespace App\Infrastructure\UserDetail\Provider;

use App\Infrastructure\UserDetail\Repository\UserDetailRepository;
use App\UserDetail\Domain\Repository\UserDetailRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class UserDetailProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            UserDetailRepositoryInterface::class,
            UserDetailRepository::class
        );
    }
}
