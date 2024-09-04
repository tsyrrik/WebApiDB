<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\GameRepositoryInterface;
use App\Repositories\GameRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(GameRepositoryInterface::class, GameRepository::class);
    }

    public function boot()
    {
        //
    }
}
