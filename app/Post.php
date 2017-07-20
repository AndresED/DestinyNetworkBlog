<?php

namespace DestinyH;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model
{
    use Sluggable, SluggableScopeHelpers;
    protected $table = 'posts';
    protected $fillable = [
        'id',
        'post_title',
        'post_tag',
        'post_date',
        'post_img',
        'post_content',
        'post_karma',
        'post_slug',
        'user_id'
    ];
    public function sluggable()
    {
        return [
            'post_slug' => [
                'source' => 'post_title',
            ]
        ];
    }

    public function comments()
    {
        return $this->hasMany('DestinyH\Comment');
    }
    public function user()
    {
        return $this->belongsTo('DestinyH\User');
    }
    public function game()
    {
        return $this->belongsTo('DestinyH\Game');
    }

}
