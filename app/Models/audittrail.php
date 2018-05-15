<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class audittrail extends Model
{
    protected $fillable = [
        'event_type', 'description', 'user_id', 'date'
    ];
}
