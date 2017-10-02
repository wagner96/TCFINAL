<?php

namespace TC\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Pet extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id',
        'fkUser',
        'name_pet',
        'age_pet',
        'proportion_pet',
        'species_pet',
        'breed_pet',
        'movie_pet',
        'city_pet',
        'state_pet'       
    ];

}
