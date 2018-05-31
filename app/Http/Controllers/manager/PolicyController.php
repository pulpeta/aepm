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

    public function deletepolicy($id){

        //recupera id policy
        //verifica che non sia ancora assegnata

        //se assegnata non elimina e manda avviso

        //se non assegnata elimina da tabella pivot le istanze con id policy
        $sql='DELETE FROM action_policy where policy_id = :policy_id';
        DB::delete($sql, [policy_id => $id]);

        //elimina da tabella policies il
        $res = Policy::where('id', $id)->delete();

        return redirect()->back();
    }

}
