<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Department;
use Session;
use DB;

class AdminController extends Controller
{
    public function HomeRoute(){
        return view('/root_admin/home');
    }

    public function AdminLogin(Request $req){
        $id = $req->id;
        $password = md5($req->password);
        $admin = Admin::where('id','=',$id)->where('password','=',$password)->first();

        if($admin){
            if($admin->status==1 && $admin->role=="root"){
                Session::put('name',$admin->name);
                Session::put('email',$admin->email);
                Session::put('phone',$admin->phone);
                Session::put('department',$admin->department);
                Session::put('role',$admin->role);
                return redirect('/root/home');
            }
            else if($admin->status==1 && $admin->role=="dep"){
                Session::put('name',$admin->name);
                Session::put('email',$admin->email);
                Session::put('phone',$admin->phone);
                Session::put('department',$admin->department);
                Session::put('role',$admin->role);
                return redirect('/dep-admin/home');
            }
            else{
                return redirect()->back()->with('error','User not Approved Yet');
            }
            
        }
        else{
            return redirect()->back()->with('error','Invalid Details');
        }
    }

    public function AdminLogout(Request $req){
        $req->session()->forget(['name','email','phone','department','role']);
        return redirect('/login');
    }


    public function AdminCreate(){
        $departments = Department::all();
        return view('/root_admin/create_dep_admin',compact('departments'));
    }


    public function AdminSave(Request $request){

        $id='';
        for($i=0;$i<8;$i++){
            $id.= rand(0,9); 
        }

        $obj = new Admin();

        $obj->id = $id;
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = md5($request->password);
        $obj->phone = $request->phone;
        $obj->department = $request->department;
        $obj->role = $request->role;
        $obj->status = $request->status == 'true' ? 1:0;

        if($obj->save()){
            return redirect('/root/view-dep-admin');
        }
    }

    public function AdminView(){
        $admins = DB::table('admins')->where('role', '=', 'dep')->get();
        return view('/root_admin/view_dep_admin',compact('admins'));
    }

    public function AdminEdit($id){
        $admin = Admin::find($id);
        $departments = Department::all();

        return view('/root_admin/edit_dep_admin',compact('admin','departments'));
    }

    public function AdminUpdate(Request $request,$id){
        $obj = Admin::find($id);
        
        $obj->id = $id;
        $obj->name = $request->name;
        $obj->email = $request->email;  
        $obj->phone = $request->phone;
        $obj->department = $request->department;
        $obj->role = $request->role;
        $obj->status = $request->status == 'true' ? 1:0;
        if($obj->save()){
            return redirect('/root/view-dep-admin');
        }
    }

    public function AdminDelete($id){
        if(Admin::find($id)->delete()){
            return redirect('/root/view-dep-admin');
        }
    }

}
