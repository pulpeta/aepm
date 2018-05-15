<?php

namespace App\Http\Controllers;

use App\Models\Manager\Address_list;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AddressController extends Controller
{
    public function index(Request $request){

        $qrbuilder = Address_list::orderBy('created_at', 'DESC');
        if($request->has('email')){
            $qrbuilder->where('email', 'like', '%'. $request->input('email') .'%');
        }
        $address_list = $qrbuilder->get();

        return view('manager.mngaddress', ['address_list' => $address_list]);
    }

    public function deleteaddress($id){

        $res = DB::table('address_lists')->where('id', $id)->delete();

        return redirect()->back();

    }

    public function editaddress($id){

        $address = Address_list::find($id);
        return view('manager.mngeditaddress')->with('address', $address);

    }

    public function updateaddress($id, Request $req){

        $res = Address_list::where('id', $id)->update(
            [
                'email' => request()->input('email')
            ]
        );
        //verifica se l'operazione è andata a buon fine e genera messaggio
        $message = $res ? 'Email Address: '. request()->input('email') .' updated' : 'Email Address: '. request()->input('email') .' not updated';

        session()->flash('message', $message);
        return redirect()->route('address');

    }

    public function newaddress(){

        return view('manager.mngcreateaddress');

    }

    public function addaddress(){

        $data = request()->only(['email']);
        $data['created_at'] = carbon::now();

        //$res = DB::table('blacklists')->insert($data);

        $res = Address_list::create($data);

        $message = $res ? 'Email Address '. $data['email'].' created' : 'Email Address '. $data['email'].' not created';

        session()->flash('message', $message);
        return redirect()->route('address');

    }
}
