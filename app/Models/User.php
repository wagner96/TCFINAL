<?php

namespace TC\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable,
        CanResetPassword;

    public function getAuthPassword() {
        return $this->password;
    }

    protected $table = "users";
    protected $fillable = [
        'id',
        'name',
        'email',
        'breed',
        'password',
        'phone',
        'state',
        'cep',
        'city',
        'district',
        'complement',
        'social_network',
        'birth_date',
        'role',
        'active_user',
        'description_actions',
        'updated_at',
        'created_at',
        'remember_token'];
    protected $hidden = [
        'password'
    ];
    public $timestamps = false;

    public function user() {
        return $this->hasMany(User::class);
    }

}
