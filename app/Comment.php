<?php

namespace DestinyH;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    
    protected $table = 'comments';
    protected $fillable = [
        'id',
        'comment_content',
        'comment_date',
        'comment_karma',
    ];
    public function post()
    {
        return $this->belongsTo('DestinyH\Post');
    }
    public function user()
    {
        return $this->belongsTo('DestinyH\User');
    }
}
