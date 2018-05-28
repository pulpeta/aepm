<?php

namespace App\Models\Manager;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
return $this->belongsToMany('policies', 'action_policy', 'action_id','policy_id' );

}
