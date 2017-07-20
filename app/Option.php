<?php

namespace DestinyH;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'options';
    protected $fillable = [
        'option_name',
        'option_value',
    ];
}
