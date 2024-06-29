<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Version;


class VersionController extends Controller
{
    public function VersionCreate(){
        return view('/dep_admin/create_versions');
    }

    public function VersionSave(Request $request){

        $obj = new Version();

        $obj->name = $request->ver_name;

        if($obj->save()){
            return redirect('/dep-admin/view-version');
        }
    }

    public function VersionView(){
        $versions = Version::all();

        return view('/dep_admin/view_versions',compact('versions'));
    }

    public function VersionEdit($id){
        $version = Version::find($id);
        return view('/dep_admin/edit_version',compact('version'));
    }

    public function VersionUpdate(Request $request,$id){
        $obj = Version::find($id);
        $obj->name = $request->ver_name;
        if($obj->save()){
            return redirect('/dep-admin/view-version');
        }
    }

    public function VersionDelete($id){
        if(Version::find($id)->delete()){
            return redirect('/dep-admin/view-version');
        }
    }
}
