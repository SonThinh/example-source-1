<?php

namespace App\Providers;

use App\Contracts\AdminRepository;
use App\Contracts\QuestionRepository;
use App\Repositories\EloquentAdminRepository;
use App\Repositories\EloquentQuestionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(QuestionRepository::class, EloquentQuestionRepository::class);
        $this->app->singleton(AdminRepository ::class, EloquentAdminRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
