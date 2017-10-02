<?php

namespace TC\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
   

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
                'TC\Repositories\UserRepository',
                'TC\Repositories\UserRepositoryEloquent'
                );
    }
}
