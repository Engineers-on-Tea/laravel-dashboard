<?php

namespace App\Modules\User\Models;

use App\Models\BaseModel;

class User extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the posts for the user.
     */
    public function posts()
    {
        return $this->hasMany('App\Modules\Post\Models\Post');
    }
}
