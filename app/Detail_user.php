<?php

namespace DestinyH;

use Illuminate\Database\Eloquent\Model;

class Detail_user extends Model
{

    protected $table = 'detail_users';
    protected $fillable = [
        'id',
        'detail_user_link',
        'user_id',
    ];
    public function users()
    {
        return $this->belongsTo('DestinyH\User');
    }
}
