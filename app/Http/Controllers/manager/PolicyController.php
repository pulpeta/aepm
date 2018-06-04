<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manager\Policy;
use Illuminate\Support\Facades\DB;

class PolicyController extends Controller
{
    public function index(Request $request){

        $policy = Policy::orderBy('created_at', 'DESC')->get();
        $query = 'select action_policy.*, actions.action  from actions right join action_policy on actions.id = action_policy.action_id order by action_policy.policy_id, action_policy.priority ASC';
        $list_act = DB::select($query);

        return view('manager.mngpolicy', array('policy' => $policy, 'list_act' => $list_act));
    }

    public function deletepolicy($policy_id){

        $sql='DELETE FROM action_policy where policy_id = :policy_id';
        DB::delete($sql, ['policy_id' => $policy_id]);

        $sql='DELETE FROM account_policy where policy_id = :policy_id';
        DB::delete($sql, ['policy_id' => $policy_id]);

        $res = Policy::where('id', $policy_id)->delete();

        return redirect()->back();
    }

    public function newpolicy(){



    }

    public function savepolicy(){



    }

    public function editpolicy($policy_id){

        //$policy = Policy::find($policy_id);
        $policy = DB::table('policies')->where('id', $policy_id)->get();

        $action = DB::table('action_policy')
            ->join('actions', 'action_id', '=', 'actions.id')
            ->orderby('priority', 'ASC')
            ->where('policy_id', $policy_id)->get();

        return view('manager.mngeditpolicy', array('policy' => $policy, 'action' => $action));

    }

    public function updatepolicy(){



    }

    public function addaction(){



    }

    public function removeaction(){



    }

}
