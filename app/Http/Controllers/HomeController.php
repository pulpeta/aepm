<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if($user->is_enabled === 0){
            return redirect('/login');
        }

        if($user->is_admin === 1){
            return redirect('/admin/dashboard');
        }

        if($user->is_admin === 0){
            return redirect('/manager/dashboard');
        }

        if(!($user->is_admin)){
            return redirect('/login');
        }

    }
}
