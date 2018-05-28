<?php

namespace App\Models\Manager;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    Public function actionstoPolicy(){

        return $this->belongsToMany('actions', 'action_policy', 'policy_id','action_id' );

    }
}
