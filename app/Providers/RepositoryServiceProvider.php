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
        $this->app->bind(
            'TC\Repositories\PetRepository',
            'TC\Repositories\PetRepositoryEloquent'
            );
        $this->app->bind(
            'TC\Repositories\AdPetAbandonedRepository',
            'TC\Repositories\AdPetAbandonedRepositoryEloquent'
            );
        $this->app->bind(
            'TC\Repositories\AdPetDisappearedRepository',
            'TC\Repositories\AdPetDisappearedRepositoryEloquent'
            );
        $this->app->bind(
            'TC\Repositories\PhotosPetRepository',
            'TC\Repositories\AdPetDisappearedRepositoryEloquent'
            );

    }
}
