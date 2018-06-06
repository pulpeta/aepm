<?php

namespace App\Models\Manager;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = [
        'policy_name', 'description', 'is_enabled', 'created_at', 'updated_at'
    ];

    Public function actions(){

        return $this->belongsToMany('Action', 'action_policy', 'policy_id', 'action_id');

    }
}
