<?php

namespace DestinyH;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = [
        'ticket_email',
        'ticket_subject',
        'ticket_content',
        'ticket_completed',
    ];
}
