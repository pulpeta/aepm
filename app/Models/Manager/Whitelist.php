<?php

namespace App\Models\Manager;

use Illuminate\Database\Eloquent\Model;

class Whitelist extends Model
{

    protected $fillable = [
        'domain', 'user_id', 'created_at', 'updated_at', 'deleted_at'
    ];

}
