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



        if(request()->input('is_admin') != null){
            $admin = 1;
        }else{
            $admin = 0;
        }

        if(request()->input('is_enabled') != null){
            $enable = 1;
        }else{
            $enable = 0;
        }

        if(request()->input('cpw') == null){
            $password = request()->input('pw');
        }else{
            $password = bcrypt(request()->input('cpw'));
        }

        if(1>2){
            $res = UserList::where('id', $id)->update(
                [
                    'name' => request()->input('name'),
                    'email' => request()->input('email'),
                    'password' => $password,
                    'is_admin' => $admin,
                    'is_enabled' => $enable,
                    'updated_at' => Carbon::now()
                ]
            );
        }else{
            $res = UserList::where('id', $id)->update(
                [
                    'name' => request()->input('name'),
                    'email' => request()->input('email'),
                    'is_admin' => $admin,
                    'is_enabled' => $enable,
                    'updated_at' => Carbon::now()
                ]
            );
        }

        return redirect()->back();

    }

    public function enable_user($id){

        $user = UserList::find($id);

        if($user->is_enabled == 1){

            $res = UserList::where('id', $id)->update(
                [
                    'is_enabled' => 0,
                    'updated_at' => Carbon::now()
                ]
            );

        }elseif($user->is_enabled == 0){

            $res = UserList::where('id', $id)->update(
                [
                    'is_enabled' => 1,
                    'updated_at' => Carbon::now()
                ]
            );
        }

        return redirect()->route('users');

    }

    public function adduser(){

        $user = new UserList();
        $user->name = request()->input('name');
        $user->email = request()->input('email');
        $user->is_admin = request()->input('is_admin');
        $user->is_enabled = 0;
        $user->password = bcrypt(request()->input('cpw'));
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

    public function import(){

        return view('admin.admimport');

    }
}
