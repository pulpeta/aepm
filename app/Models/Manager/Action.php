<?php

namespace App\Models\Manager;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public function policies(){

        return $this->belongsToMany('Policy', 'action_policy', 'action_id', 'policy_id');

    }

}
