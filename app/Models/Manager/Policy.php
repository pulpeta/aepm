<?php

namespace App\Models\Manager;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    Public function actions(){

        return $this->belongsToMany('Action', 'action_policy', 'policy_id', 'action_id');

    }
}
