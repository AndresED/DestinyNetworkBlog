<?php

namespace DestinyH;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{

    protected $table = 'register';
    protected $fillable = [
        'id',
        'register_user_id',
        'register_date',
        'register_game_id',
    ];
    public function games()
    {
        return $this->hasMany('DestinyH\Game');
    } 
}
