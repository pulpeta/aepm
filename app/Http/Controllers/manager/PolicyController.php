<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manager\Policy;
use Illuminate\Support\Facades\DB;

class PolicyController extends Controller
{
    public function index(Request $request){

        $pol = Policy::orderBy('created_at', 'DESC')->get();
        $query = 'select action_policy.*, actions.action  from actions right join action_policy on actions.id = action_policy.action_id order by action_policy.policy_id, action_policy.priority ASC';
        $acts = DB::select($query);

        $policy = array();

             foreach($pol as $p){
                 $policy['id'][] = $p->id;
                 $policy['policy_name'][] = $p->policy_name;
                 $policy['description'][] = $p->description;
                 $policy['is_enabled'][] = $p->is_enabled;
                 $policy['created_at'][] = $p->created_at;
                 $policy['updated_at'][] = $p->updated_at;
                 foreach ($acts as $a){
                     if($p->id == $a->policy_id){
                         $policy['action']['action_name'][] = $a->action;
                         $policy['action']['priority'][] = $a->priority;
                         $policy['action']['is_active'][] = $a->is_active;
                     }
                 }
             }
            dd($policy);
         //return view('manager.mngpolicy', ['policy' => $policy]);
    }

}
