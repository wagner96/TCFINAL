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
        'user_id',
        'name_pet',
        'age_pet',
        'proportion_pet',
        'species_pet',
        'breed_pet',
        'movie_pet',
        'city_pet',
        'state_pet',
        'active_pet',
        'updated_at',
        'created_at'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function AdPetAbandoned()
    {
        return $this->hasOne(AdPetAbandoned::class);
    }

    public function AdPetDisappeared()
    {
        return $this->hasOne(AdPetDisappeared::class);
    }

    public function PhotosPet()
    {
        return $this->hasMany(PhotosPet::class);
    }

}
