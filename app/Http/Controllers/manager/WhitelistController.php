<?php

namespace App\Http\Controllers;

use App\Models\Manager\Whitelist;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class WhitelistController extends Controller
{
    public function index(Request $request){

        $qrbuilder = Whitelist::orderBy('created_at', 'DESC');
        if($request->has('domain')){
            $qrbuilder->where('domain', 'like', '%'. $request->input('domain') .'%');
        }
        $list = $qrbuilder->get();

        return view('manager.mngwhitelist', ['list' => $list]);
    }

    public function deletedomain($id){

        $res = Whitelist::where('id', $id)->delete();

        return redirect()->back();

    }

    public function editdomain($id){

        $domain = Whitelist::find($id);
        return view('manager.mngeditwhitelist')->with('domain', $domain);

    }

    public function updatedomain($id, Request $req){

        $res = Whitelist::where('id', $id)->update(
            [
                'domain' => request()->input('domain'),
                'user_id' => 1,
                'updated_at' => Carbon::now()
            ]
        );
        //verifica se l'operazione è andata a buon fine e genera messaggio
        $message = $res ? 'Domain: '. request()->input('domain') .' updated' : 'Domain: '. request()->input('domain') .' not updated';

        session()->flash('message', $message);
        return redirect()->route('whitelist');

    }

    public function newdomain(){

        return view('manager.mngcreatewhitelist');

    }

    public function adddomain(){

        $data = request()->only(['domain']);
        $data['user_id'] = 1;
        $data['created_at'] = carbon::now();

        //$res = DB::table('blacklists')->insert($data);

        $res = Whitelist::create($data);

        $message = $res ? 'Domain '. $data['domain'].' created' : 'Domain '. $data['domain'].' not created';

        session()->flash('message', $message);
        return redirect()->route('whitelist');

    }
}
