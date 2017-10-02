<?php

namespace TC\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use TC\Repositories\Ad_pet_disappearedRepository;
use TC\Models\AdPetDisappeared;
use TC\Validators\AdPetDisappearedValidator;

/**
 * Class AdPetDisappearedRepositoryEloquent
 * @package namespace TC\Repositories;
 */
class AdPetDisappearedRepositoryEloquent extends BaseRepository implements AdPetDisappearedRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AdPetDisappeared::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
