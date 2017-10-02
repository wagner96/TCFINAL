<?php

namespace TC\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use TC\Repositories\Photos_petRepository;
use TC\Models\PhotosPet;
use TC\Validators\PhotosPetValidator;

/**
 * Class PhotosPetRepositoryEloquent
 * @package namespace TC\Repositories;
 */
class PhotosPetRepositoryEloquent extends BaseRepository implements PhotosPetRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PhotosPet::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
