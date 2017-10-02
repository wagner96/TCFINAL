<?php

namespace TC\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class AdPetDisappeared extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id',
        'fkPet',
        'reward',
        'where',
        'when'];

}
