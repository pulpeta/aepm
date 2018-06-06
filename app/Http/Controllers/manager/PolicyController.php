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

        $list_action = DB::table('actions')->orderby('action', 'ASC')->get();

        return view('manager.mngeditpolicy', array('policy' => $policy, 'action' => $action, 'list_action' => $list_action));

    }

    public function updatepolicy($id){



    }

    public function enablepolicy($id){

        $query = 'select policies.is_enabled from policies where id = '.$id;
        $is_enabled = DB::select($query);

        foreach ($is_enabled as $i){
            switch ($i->is_enabled){

                case 0:
                    DB::table('policies')->where('id', $id)
                        ->update(['is_enabled' => 1]);

                    break;

                case 1:
                    DB::table('policies')->where('id', $id)
                        ->update(['is_enabled' => 0]);

                    break;
            }
        }



        return redirect()->back();

    }

    public function addaction($id){


        return redirect()->back();

    }

    public function removeaction($id){

        $sql='DELETE FROM action_policy where id = :id';
        DB::delete($sql, ['id' => $id]);

        return redirect()->back();

    }

    public function activeaction($id){

        $sql = DB::table('action_policy')->where('id', $id)->get();

        if($sql['is_active']=1){
            DB::table('action_policy')->where('id', $id)
                ->update(['is_active' => 0]);
        }else{
            DB::table('action_policy')->where('id', $id)
                ->update(['is_active' => 1]);
        }

        return redirect()->back();

    }

}
