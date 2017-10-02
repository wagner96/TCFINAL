<?php

namespace TC\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use TC\Repositories\Ad_pet_abandonedRepository;
use TC\Models\AdPetAbandoned;
use TC\Validators\AdPetAbandonedValidator;

/**
 * Class AdPetAbandonedRepositoryEloquent
 * @package namespace TC\Repositories;
 */
class AdPetAbandonedRepositoryEloquent extends BaseRepository implements AdPetAbandonedRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AdPetAbandoned::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
