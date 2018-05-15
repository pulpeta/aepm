<?php

namespace App\Http\Controllers;

use App\Models\Manager\Blacklist;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class BlacklistController extends Controller
{
    public function index(Request $request){

        $qrbuilder = Blacklist::orderBy('created_at', 'DESC');
        if($request->has('domain')){
            $qrbuilder->where('domain', 'like', '%'. $request->input('domain') .'%');
        }
        $list = $qrbuilder->get();

        return view('manager.mngblacklist', ['list' => $list]);
    }

    public function deletedomain($id){

        $res = DB::table('blacklists')->where('id', $id)->delete();

        return redirect()->back();

    }

    public function editdomain($id){

        $domain = Blacklist::find($id);
        return view('manager.mngeditblacklist')->with('domain', $domain);

    }

    public function updatedomain($id, Request $req){

        $res = Blacklist::where('id', $id)->update(
            [
                'domain' => request()->input('domain'),
                'user_id' => 1,
                'updated_at' => Carbon::now()
            ]
        );
        //verifica se l'operazione è andata a buon fine e genera messaggio
        $message = $res ? 'Domain: '. request()->input('domain') .' updated' : 'Domain: '. request()->input('domain') .' not updated';

        session()->flash('message', $message);
        return redirect()->route('blacklist');

    }

    public function newdomain(){

        return view('manager.mngcreateblacklist');

    }

    public function adddomain(){

        $data = request()->only(['domain']);
        $data['user_id'] = 1;
        $data['created_at'] = carbon::now();

        $res = Blacklist::create($data);

        $message = $res ? 'Domain '. $data['domain'].' created' : 'Domain '. $data['domain'].' not created';

        session()->flash('message', $message);
        return redirect()->route('blacklist');

    }
}
