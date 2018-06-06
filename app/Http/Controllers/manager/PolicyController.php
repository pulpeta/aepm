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

        $policy = DB::table('policies')->where('id', $policy_id)->get();

        $query = 'SELECT action_policy.id, action_policy.policy_id, action_policy.priority, action_policy.is_active, actions.action FROM actions right JOIN action_policy ON actions.id = action_policy.action_id WHERE action_policy.policy_id = :policy_id';
        $action = DB::select($query, ['policy_id' => $policy_id]);

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

    public function addaction($policy_id, Request $request){

        $action_id = $request->action_id;

        //verifica che non ci sia già l'azione inserita

        $check_action = DB::table('action_policy')
            ->where('policy_id', $policy_id)
            ->where('action_id', $action_id)
            ->get();

        $count=count($check_action);

        if($count == 0){

            $count_action = DB::table('action_policy')
                ->where('policy_id', $policy_id)
                ->get();

            $priority=count($count_action);

            DB::table('action_policy')->insert(
              array(
                  'policy_id' => $policy_id,
                  'action_id' => $action_id,
                  'priority' => $priority,
                  'is_active' => 0
              )
            );
        }

        return redirect()->back();

    }

    public function removeaction($id){

        $sql='DELETE FROM action_policy where id = :id';
        DB::delete($sql, ['id' => $id]);

        return redirect()->back();

    }

    public function activeaction($id){

        $query = 'select action_policy.is_active from action_policy where id = '.$id;

        $is_active = DB::select($query);

        foreach ($is_active as $i) {
            switch ($i->is_active) {

                case 0:
                    DB::table('action_policy')->where('id', $id)
                        ->update(['is_active' => 1]);

                    break;

                case 1:
                    DB::table('action_policy')->where('id', $id)
                        ->update(['is_active' => 0]);

                    break;
            }
        }

        return redirect()->back();

    }

}
