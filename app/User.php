<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'name', 'email', 'password',
        'gender',
        'name',
        'location',
        'email',
        'login',
        'dob',
        'registered',
        'phone',
        'cell',
        'id_user',
        'picture',
        'nat',
        'password',
        'email_verified_at',
        'status',
        'imported_t'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'gender'     => 'string',
        'email'      => 'string',
        'phone'      => 'string',
        'cell'       => 'string',
        'nat'        => 'string',
        'name'       => 'array',
        'location'   => 'array',
        'login'      => 'array',
        'dob'        => 'array',
        'registered' => 'array',
        'id_user'    => 'array',
        'picture'    => 'array',
        // 'email_verified_at' => 'datetime',
    ];
}
