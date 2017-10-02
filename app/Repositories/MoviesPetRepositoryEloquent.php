<?php

namespace TC\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use TC\Repositories\movies_petRepository;
use TC\Models\MoviesPet;
use TC\Validators\MoviesPetValidator;

/**
 * Class MoviesPetRepositoryEloquent
 * @package namespace TC\Repositories;
 */
class MoviesPetRepositoryEloquent extends BaseRepository implements MoviesPetRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MoviesPet::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
