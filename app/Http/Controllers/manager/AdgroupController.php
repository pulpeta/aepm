<?php

namespace App\Http\Controllers;

use App\Models\Manager\Adgroup_list;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AdgroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        $qrbuilder = Adgroup_list::orderBy('created_at', 'DESC');
        if($request->has('adgroup_name')){
            $qrbuilder->where('adgroup_name', 'like', '%'. $request->input('adgroup_name') .'%');
        }
        $adgroup_list = $qrbuilder->get();

        return view('manager.mngadgroup', ['adgroup_list' => $adgroup_list]);
    }

    public function deleteadgroup($id){

        $res = Adgroup_list::where('id', $id)->delete();

        return redirect()->back();

    }

    public function editadgroup($id){

        $adgroup = Adgroup_list::find($id);
        return view('manager.mngeditadgroup')->with('adgroup', $adgroup);

    }

    public function updateadgroup($id, Request $req){

        $res = Adgroup_list::where('id', $id)->update(
            [
                'adgroup_name' => request()->input('adgroup_name'),
                'description' => request()->input('description')
            ]
        );
        //verifica se l'operazione è andata a buon fine e genera messaggio
        $message = $res ? 'AD Group: '. request()->input('adgroup_name') .' updated' : 'AD Group: '. request()->input('adgroup_name') .' not updated';

        session()->flash('message', $message);
        return redirect()->route('adgroup');

    }

    public function newadgroup(){

        return view('manager.mngcreateadgroup');

    }

    public function addadgroup(){

        $data = request()->only(['adgroup_name', 'description']);
        $data['created_at'] = carbon::now();

        //$res = DB::table('blacklists')->insert($data);

        $res = Adgroup_list::create($data);

        $message = $res ? 'AD Group '. $data['adgroup_name'].' created' : 'AD Group '. $data['adgroup_name'].' not created';

        session()->flash('message', $message);
        return redirect()->route('adgroup');

    }
}
