<?php

namespace App\models\manager;

use Illuminate\Database\Eloquent\Model;

class Adgroup_list extends Model
{
    protected $fillable = [
        'adgroup_name', 'description', 'created_at', 'updated_at'
    ];

}
