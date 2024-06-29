<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;


class DepartmentController extends Controller
{
    public function DepCreate(){
        return view('/root_admin/create_dep');
    }

    public function DepSave(Request $request){

        $obj = new Department();
        $obj->dep_name = $request->dep_name;
        $obj->dep_code = $request->dep_code;
        $obj->dep_estb = $request->dep_estb;

        if($obj->save()){
            return redirect('/root/view-department');
        }
    }

    public function DepView(){
        $departments = Department::all();

        return view('/root_admin/view_dep',compact('departments'));
    }

    public function DepEdit($id){
        $department = Department::find($id);
        return view('/root_admin/edit_dep',compact('department'));
    }

    public function DepUpdate(Request $request,$id){
        $obj = Department::find($id);
        $obj->dep_name = $request->dep_name;
        $obj->dep_code = $request->dep_code;
        $obj->dep_estb = $request->dep_estb;
        if($obj->save()){
            return redirect('/root/view-department');
        }
    }

    public function DepDelete($id){
        if(Department::find($id)->delete()){
            return redirect('/root/view-department');
        }
    }
}
