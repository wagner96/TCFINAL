<?php

namespace TC\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use TC\Repositories\PetRepository;
use TC\Models\Pet;
use TC\Validators\PetValidator;

/**
 * Class PetRepositoryEloquent
 * @package namespace TC\Repositories;
 */
class PetRepositoryEloquent extends BaseRepository implements PetRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pet::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
