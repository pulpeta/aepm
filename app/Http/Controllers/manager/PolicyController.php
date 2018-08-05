<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manager\Policy;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Psr\Log\NullLogger;

class PolicyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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

        return view('manager.mngcreatepolicy');

    }

    public function savepolicy(Request $request){

        $data['policy_name'] = request()->input('policy_name');
        $data['description'] = request()->input('description');
        $data['is_enabled'] = 0;
        $data['created_at'] = carbon::now();

        Policy::create($data);

        $id_policy = DB::select('SELECT id FROM policies ORDER BY id DESC LIMIT 1');

        foreach($id_policy as $i){
            $id = $i->id;
        }

        return redirect()->route('edit_policy', ['id' => $id]);

    }

    public function editpolicy($policy_id){

        $policy = DB::table('policies')->where('id', $policy_id)->get();

        $query = 'SELECT action_policy.id, action_policy.policy_id, action_policy.priority, action_policy.is_active, actions.action FROM actions right JOIN action_policy ON actions.id = action_policy.action_id WHERE action_policy.policy_id = :policy_id';
        $action = DB::select($query, ['policy_id' => $policy_id]);

        $list_action = DB::table('actions')->orderby('action', 'ASC')->get();

        return view('manager.mngeditpolicy', array('policy' => $policy, 'action' => $action, 'list_action' => $list_action));

    }

    public function updatepolicy($id){

        Policy::where('id', $id)->update(
            [
                'policy_name' => request()->input('policy_name'),
                'description' => request()->input('description'),
                'updated_at' => Carbon::now()
            ]
        );

        return redirect()->back();

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

    public function updateactionpriority($id, Request $request){

        DB::table('action_policy')
            ->where('id', $id)
            ->update(['priority' => request()->input('priority')]);

        return redirect()->back();

    }

    public function policyassignment(){

        $policy = Policy::orderBy('created_at', 'DESC')->get();

        $query = 'select account_policy.*, adgroup_lists.adgroup_name  from adgroup_lists right join account_policy on adgroup_lists.id = account_policy.adgroup_list_id where account_policy.address_list_id IS NULL order by account_policy.policy_id ASC';
        $adgroup = DB::select($query);

        $query = 'select account_policy.*, address_lists.email  from address_lists right join account_policy on address_lists.id = account_policy.address_list_id where account_policy.adgroup_list_id IS NULL order by account_policy.policy_id ASC';
        $address = DB::select($query);

        return view('manager.mngpolicyassignment', array('policy' => $policy, 'adgroup' => $adgroup, 'address' => $address));
    }

    public function assign_policy($id){

        $query = 'select id, policy_name from policies where id = '.$id;
        $name = DB::select($query);

        $query = 'select account_policy.*, adgroup_lists.adgroup_name  from adgroup_lists right join account_policy on adgroup_lists.id = account_policy.adgroup_list_id where account_policy.address_list_id IS NULL and account_policy.policy_id = '.$id.' order by account_policy.policy_id ASC';
        $adgroup = DB::select($query);

        $query = 'select account_policy.*, address_lists.email  from address_lists right join account_policy on address_lists.id = account_policy.address_list_id where account_policy.adgroup_list_id IS NULL and account_policy.policy_id = '.$id.' order by account_policy.policy_id ASC';
        $address = DB::select($query);

        $query = 'select * from adgroup_lists order by adgroup_name ASC';
        $adg = DB::select($query);

        $query = 'select * from address_lists order by email ASC';
        $addr = DB::select($query);

        return view('manager.mngassignpolicy', array('name' => $name, 'adgroup' => $adgroup, 'address' => $address, 'adg' => $adg, 'addr' => $addr));

    }

    public function update_grp_assignments(Request $request){

        $policy_id = $request->policy_id;

        DB::table('account_policy')->where('policy_id', $policy_id)
                                        ->whereNull('address_list_id')
                                        ->delete();

        $adgroups = $request->except(['_token', '_method', 'policy_id']);

        foreach ($adgroups as $item){
            DB::table('account_policy')->insert([
                'policy_id' => $policy_id,
                'adgroup_list_id' => $item,
                'address_list_id' => NULL
                ]);
        }

        return redirect()->back();

    }

    public function update_addr_assignments(Request $request){

        $policy_id = $request->policy_id;

        DB::table('account_policy')->where('policy_id', $policy_id)
            ->whereNull('adgroup_list_id')
            ->delete();

        $adgroups = $request->except(['_token', '_method', 'policy_id']);

        foreach ($adgroups as $item){
            DB::table('account_policy')->insert([
                'policy_id' => $policy_id,
                'address_list_id' => $item,
                'adgroup_list_id' => NULL
            ]);
        }

        return redirect()->back();

    }

}
