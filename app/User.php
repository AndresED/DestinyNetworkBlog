<?php

namespace DestinyH;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class User extends Authenticatable
{
    use Notifiable;
    use Sluggable, SluggableScopeHelpers;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'id',
        'user_login',
        'user_nicename',
        'email',
        'user_rol',
        'user_country',
        'user_gender',
        'user_birth',
        'user_registered',
        'user_pub',
        'user_think',
        'user_about',
        'user_avatar',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sluggable()
    {
        return [
            'user_slug' => [
                'source' => 'user_nicename',
            ]
        ];
    }
    public function posts()
    {
        return $this->hasMany('DestinyH\Post');
    }
    public function comments()
    {
        return $this->hasMany('DestinyH\Comment');
    }
    public function registers()
    {
        return $this->belongsTo('DestinyH\Register');
    }

}
