<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;
use App\Models\Admin\UserList;
use App\Models\Admin\Dashboard;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){

        $qrbuilder = Dashboard::orderBy('id', 'asc')->where('id', '1');
        $lists = $qrbuilder->get();

        return view('admin.admdashboard', ['lists' => $lists]);
    }

    public function users(){

        $qrbuilder = UserList::orderBy('name', 'asc')->where('is_admin', '1');
        $qrbuilder->whereNull('deleted_at');
        $admins = $qrbuilder->get();

        $qrbuilder = UserList::orderBy('name', 'asc')->where('is_admin', '0');
        $qrbuilder->whereNull('deleted_at');
        $operators = $qrbuilder->get();

        return view('admin.admlistusers', ['admins' => $admins], ['operators' => $operators]);

    }

    public function deleteuser($id){

        //$res = UserList::where('id', $id)->delete();
        //return $res;

        $user = UserList::find($id);
        $res = $user->delete();
        return ''.$res;

    }

    public function edituser($id){

        $user = UserList::find($id);
        return view('admin.admedituser')->with('user', $user);

    }

    public function storeuser($id, Request $req){

        /*$res = UserList::where('id', $id)->update(
            [
                'name' => request()->input('name'),
                'email' => request()->input('email'),
                'is_admin' => request()->input('is_admin'),
                'is_enabled' => request()->input('is_enabled'),
                'updated_at' => Carbon::now()
            ]
        );*/

        $user = UserList::find($id);
        $user->name = request()->input('name');
        $user->email = request()->input('email');
        $user->is_admin = request()->input('is_admin');
        $user->is_enabled = request()->input('is_enabled');
        $user->updated_at = carbon::now();
        $res = $user->save();

    }

    public function adduser(){

        /*$res = UserList::insert(
            [
                'name' => request()->input('name'),
                'email' => request()->input('email'),
                'is_admin' => request()->input('is_admin'),
                'is_enabled' => 0,
                'password' => bcrypt('123456')
            ]
        );*/

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

    public function backup(){

        return view('admin.admbackup');
    }
}
