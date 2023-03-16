<?php

namespace App\Providers;

use App\Contracts\AdminRepository;
use App\Contracts\ApplyRepository;
use App\Contracts\QuestionRepository;
use App\Contracts\UserRepository;
use App\Repositories\EloquentAdminRepository;
use App\Repositories\EloquentApplyRepository;
use App\Repositories\EloquentQuestionRepository;
use App\Repositories\EloquentUserRepository;
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
        $this->app->singleton(UserRepository::class, EloquentUserRepository::class);
        $this->app->singleton(ApplyRepository::class, EloquentApplyRepository::class);
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
