<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Demand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemandController extends Controller
{
    public function index ()
    {
        $this->data['demands'] = Demand::all();
        return view('admin.demands.offer', $this->data);
    }

    public function show($id){
        $this->data['offer'] = Demand::where('id', $id)->first();
        return view('admin.demands.view', $this->data);
    }

    public function approve($id){
        $update = DB::table('demands')
        ->where('id',$id)
        ->update(['admin_approve'=> 1]);
        if ($update) {
            toastr()->success('Demand Data Updated');
            return redirect()->route('admin.demand');
        }else{
            toastr()->warning('Demand Data not Updated');
            return redirect()->route('admin.demand');
        }
    }

    public function destroy(){
        toastr()->warning('Demand is Not Delected');
        return redirect()->back();
    }
}
