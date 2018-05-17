<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Symfony\Component\VarDumper\Dumper\DataDumperInterface;
use App\Models\Admin\UserList;
use App\Models\Admin\Dashboard;

use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){

        $qrbuilder = Dashboard::orderBy('id', 'asc');
        $lists = $qrbuilder->get();

        return view('admin.admdashboard', ['lists' => $lists]);
    }

    public function users(){

        $qrbuilder = UserList::orderBy('name', 'asc');
        $admins = $qrbuilder->get();

        return view('admin.admlistusers', ['admins' => $admins]);

    }

    public function deleteuser($id){

        $res = UserList::where('id', $id)->delete();

        return redirect()->back();

    }

    public function edituser($id){

        $user = UserList::find($id);
        return view('admin.admedituser')->with('user', $user);

    }

    public function updateuser($id, Request $req){

        $user = UserList::find($id);
        $user->name = request()->input('name');
        $user->email = request()->input('email');
        //verificare password e cifratura
        $user->password = request()->input('password');
        //non può essere null
        $user->is_admin = request()->input('is_admin');
        //non può essere null
        $user->is_enabled = request()->input('is_enabled');
        $user->updated_at = carbon::now();
        $res = $user->save();

    }

    public function adduser(){

        $user = new UserList();
        $user->name = request()->input('name');
        $user->email = request()->input('email');
        $user->is_admin = request()->input('is_admin');
        $user->is_enabled = 0;
        $user->password = bcrypt('123456');
        $res = $user->save();

    }

    public function options(){

        return view('admin.admoptions');

    }

    public function uploadlicense(){



    }

    public function backup(){

        return view('admin.admbackup');

    }
}
