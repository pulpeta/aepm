<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manager\Policy;

class PolicyController extends Controller
{
    public function index(Request $request){

        $ret = Policy::orderBy('created_at', 'DESC');
        $policy = $ret->get();

        return view('manager.mngpolicy', ['policy' => $policy]);
    }

}
