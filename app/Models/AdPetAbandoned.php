<?php

namespace TC\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class AdPetAbandoned extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id',
        'fkPet',
        'personality_pet'];

}
