<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseOutcome;
use App\Models\CourseObjective;
use App\Models\CourseRational;
use DB;

class CourseProfileController extends Controller
{
    public function CPCreate(Request $request){
        $dep = $request->session()->get('department');

        $courses = DB::table('courses')->where('department', '=', $dep)->where('cp_status', '=', '0')->get();
        return view('/dep_admin/create_cp',compact('courses'));
    }

    public function CPCreateSelect(Request $request,$id){
        $course = Course::find($id);

        $dep = $request->session()->get('department');

        $pos = DB::table('program_outcomes')->where('po_dep', '=', $dep)->orderBy('id', 'asc')->get();

        return view('/dep_admin/create_cp_select',compact('pos','course'));
    }

    public function CPSave(Request $req,$id){
        


        //Course outcome
        $course_id = $req->id;
        $outcome_id = $req->cout_num;
        $outcome_des = $req->cout_des;

        for($i=0; $i < count($outcome_id); $i++){
            $mapping = json_encode($req->cout_map[$i]);
            $outcomesave = [
                'course_id' => $course_id,
                'outcome_id' => $outcome_id[$i],
                'outcome_des' => $outcome_des[$i],
                'mapping' => $mapping,
            ];
            DB::table('course_outcomes')->insert($outcomesave);
        }

        //Course objective
        $course_id = $req->id;
        $objective_id = $req->cobj_num;
        $objective_des = $req->cobj_des;

        for($i=0; $i < count($objective_id); $i++){
            $objectivesave = [
                'course_id' => $course_id,
                'objective_id' => $objective_id[$i],
                'objective_des' => $objective_des[$i],
            ];
            DB::table('course_objectives')->insert($objectivesave);
        }

        //Course Rational
        $obj = new CourseRational();

        $obj->course_id = $req->id;
        $obj->rational_des = $req->c_rational;

        //Update Course Table
        $obj2 = Course::find($id);
        $obj2->cp_status = "1";
        $obj2->save();

        if($obj->save()){
            return redirect('/dep-admin/view-cp');
        }
    }

    public function CPView(Request $request){
        $dep = $request->session()->get('department');

        $courses = DB::table('courses')->where('department', '=', $dep)->where('cp_status', '=', '1')->get();
        return view('/dep_admin/view_cp',compact('courses'));
    }

    public function CPEdit(Request $request,$id){

        $objectives = DB::table('course_objectives')->where('course_id', '=', $id)->get();
        $outcomes = DB::table('course_outcomes')->where('course_id', '=', $id)->get();
        $rational = DB::table('course_rationals')->where('course_id', '=', $id)->get();

        $dep = $request->session()->get('department');

        $pos = DB::table('program_outcomes')->where('po_dep', '=', $dep)->orderBy('id', 'asc')->get();

        $course_info = Course::find($id);

        return view('/dep_admin/edit_cp',compact('objectives','outcomes','rational','pos','id','course_info'));
    }


    public function CPDelete(Request $req,$id){


        DB::table('course_objectives')->where('course_id', '=', $id)->delete();
        DB::table('course_outcomes')->where('course_id', '=', $id)->delete();
        DB::table('course_rationals')->where('course_id', '=', $id)->delete();

        $obj = Course::find($id);
        $obj->cp_status = "0";

        if($obj->save()){
            return redirect('/dep-admin/view-cp');
        }
      }

      public function CPEditObjective($id){

        $objective = CourseObjective::find($id);
        return view('/dep_admin/edit_cp_obj',compact('objective'));

      }

      public function CPUpdateObjective(Request $request,$id){

        $objective = CourseObjective::find($id);
        $objective->objective_id = $request->cobj_num;
        $objective->objective_des = $request->cobj_des;

        if($objective->save()){
            return redirect('/dep-admin/edit-cp/'.$objective->course_id);
        }

      }

      public function CPEditOutcome(Request $request,$id){

        $outcome = CourseOutcome::find($id);

        $dep = $request->session()->get('department');

        $pos = DB::table('program_outcomes')->where('po_dep', '=', $dep)->orderBy('id', 'asc')->get();

        return view('/dep_admin/edit_cp_out',compact('outcome','pos'));

      }

      public function CPUpdateOutcome(Request $request,$id){

        $outcome = CourseOutcome::find($id);
        $outcome->outcome_id = $request->cout_num;
        $outcome->outcome_des = $request->cout_des;
        $outcome->mapping = json_encode($request->cout_map);

        if($outcome->save()){
            return redirect('/dep-admin/edit-cp/'.$outcome->course_id);
        }

      }

      public function CPEditRational($id){

        $rational = CourseRational::find($id);
        return view('/dep_admin/edit_cp_rtn',compact('rational'));

      }

      public function CPUpdateRational(Request $request,$id){

        $rational = CourseRational::find($id);
        $rational->rational_des = $request->c_rational;

        if($rational->save()){
            return redirect('/dep-admin/edit-cp/'.$rational->course_id);
        }

      }

}
