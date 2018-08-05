<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AudittrailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $qrbuilder = Audittrail::orderBy('date', 'desc');
        $lists = $qrbuilder->get();

        //return view('admin.admdashboard', ['lists' => $lists]);
    }
}
