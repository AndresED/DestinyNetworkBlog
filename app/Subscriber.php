<?php

namespace DestinyH;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $table = 'subscribers';
    protected $fillable = [
        'subscriber_email',
        'subscriber_token',
        'subscriber_active',
    ];
    protected $hidden = [
        'subscriber_token',
    ];
}
