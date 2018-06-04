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

    public function editpolicy($policy_id){

        $pol = Policy::find($policy_id);

        $act = DB::table('action_policy')
            ->join('actions', 'action_id', '=', 'actions.id')
            ->where('policy_id', $policy_id)->get();

        return view('manager.mngeditpolicy', array('pol' => $pol, 'act' => $act));

    }

    public function updatepolicy(){



    }

    public function addaction(){



    }

    public function removeaction(){



    }

}
