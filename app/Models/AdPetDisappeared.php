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
        'pet_id',
        'reward',
        'where',
        'when',
        'updated_at',
        'created_at'];

    public function Pet()
    {
        return $this->hasOne(Pet::class);
    }
}
