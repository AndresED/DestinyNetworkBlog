<?php

namespace DestinyH;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Game extends Model
{
    use Sluggable, SluggableScopeHelpers;
    protected $table = 'games';
    protected $fillable = [
        'id',
        'game_name',
        'game_description',
        'game_big_description',
        'game_link',
        'game_trailer',
        'game_img',
        'game_karma',
        'game_developer',
        'game_release',
    ];

    public function sluggable()
    {
        return [
            'game_slug' => [
                'source' => 'game_name',
            ]
        ];
    }

    public function registers()
    {
        return $this->hasMany('DestinyH\Register');
    }

    public function posts()
    {
        return $this->hasMany('DestinyH\Post');
    }
}
