<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
    protected $table = 'rsvps';

    protected $fillable = [
        'template_slug',
        'name',
        'status',
        'message',
    ];
}
