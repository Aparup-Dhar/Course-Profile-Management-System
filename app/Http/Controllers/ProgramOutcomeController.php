<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramOutcome;

use DB;

class ProgramOutcomeController extends Controller
{
    public function POCreate(){
        return view('/dep_admin/create_po');
    }

    public function POSave(Request $req){
        $po_dep = $req->session()->get('department');
        
        $po_num = $req->po_num;
        $po_title = $req->po_title;
        $po_des = $req->po_des;

        for($i=0; $i < count($po_num); $i++){
            $datasave = [
                'po_num' => $po_num[$i],
                'po_title' => $po_title[$i],
                'po_des' => $po_des[$i],
                'po_dep' => $po_dep
            ];
            DB::table('program_outcomes')->insert($datasave);
        }
        return redirect('/dep-admin/view-po');

    }

    public function POView(Request $request){
        $dep = $request->session()->get('department');

        $pos = DB::table('program_outcomes')->where('po_dep', '=', $dep)->orderBy('id', 'asc')->get();

        return view('/dep_admin/view_po',compact('pos'));
    }

    public function POEdit($id){
        $po = ProgramOutcome::find($id);
        return view('/dep_admin/edit_po',compact('po'));
    }

    
    public function POUpdate(Request $request,$id){
        $obj = ProgramOutcome::find($id);
        $obj->po_num = $request->po_num;
        $obj->po_title = $request->po_title;
        $obj->po_des = $request->po_des;
        if($obj->save()){
            return redirect('/dep-admin/view-po');
        }
    }

    public function PODelete($id){
        if(ProgramOutcome::find($id)->delete()){
            return redirect('/dep-admin/view-po');
        }
    }

}
