<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AudittrailController extends Controller
{
    public function index(){

        $qrbuilder = Audittrail::orderBy('date', 'desc');
        $lists = $qrbuilder->get();

        //return view('admin.admdashboard', ['lists' => $lists]);
    }
}
