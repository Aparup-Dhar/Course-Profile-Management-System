<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Version;
use App\Models\Course;
use DB;



class CourseController extends Controller
{
    public function CourseCreate(){
        $versions = Version::all();
        return view('/dep_admin/create_course',compact('versions'));
    }

    public function CourseSave(Request $request){
        $obj = new Course();

        $obj->name = $request->cor_name;
        $obj->short_name = $request->cor_srt_name;
        $obj->course_code = $request->cor_code;
        $obj->credit = $request->cor_credit;
        $obj->type = $request->cor_type;
        $obj->department = $request->cor_dep;
        $obj->version = $request->cor_version;
        $obj->cp_status = "0";


        if($obj->save()){
            return redirect('/dep-admin/view-course');
        }
    }

    public function CourseView(Request $request){
        $dep = $request->session()->get('department');

        $courses = DB::table('courses')->where('department', '=', $dep)->get();

        return view('/dep_admin/view_course',compact('courses'));
    }

    public function CourseEdit($id){
        $course = Course::find($id);
        $versions = Version::all();

        return view('/dep_admin/edit_course',compact('course','versions'));
    }

    public function CourseUpdate(Request $request,$id){
        $obj = Course::find($id);

        $obj->name = $request->cor_name;
        $obj->short_name = $request->cor_srt_name;
        $obj->course_code = $request->cor_code;
        $obj->credit = $request->cor_credit;
        $obj->type = $request->cor_type;
        $obj->department = $request->cor_dep;
        $obj->version = $request->cor_version;

        if($obj->save()){
            return redirect('/dep-admin/view-course');
        }
    }

    public function CourseDelete($id){
        if(Course::find($id)->delete()){
            return redirect('/dep-admin/view-course');
        }
    }
}
