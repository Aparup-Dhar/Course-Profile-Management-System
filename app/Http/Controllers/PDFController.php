<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Department;
use App\Models\Course;
use App\Models\CourseRational;
use App\Models\CourseObjective;
use App\Models\CourseOutcome;
use App\Models\ProgramOutcome;

use DB;

class PDFController extends Controller
{
    public function GeneratePDF($id){
        
        $dep_code = DB::table('courses')->where('id', '=', $id)->pluck('department');
        $department = DB::table('departments')->where('dep_code', '=', $dep_code)->first();

        $course = Course::find($id);

        $rational = DB::table('course_rationals')->where('course_id', '=', $id)->first();

        $objectives = DB::table('course_objectives')->where('course_id', '=', $id)->get();

        $outcomes = DB::table('course_outcomes')->where('course_id', '=', $id)->get();

        $program_outcomes = DB::table('program_outcomes')->where('po_dep', '=', $dep_code)->get();

        $pdf = Pdf::loadView('pdf',compact('department','course','rational','objectives','outcomes','program_outcomes'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }
    
    public function DownloadPDF($id){
        $dep_code = DB::table('courses')->where('id', '=', $id)->pluck('department');
        $department = DB::table('departments')->where('dep_code', '=', $dep_code)->first();

        $course = Course::find($id);

        $rational = DB::table('course_rationals')->where('course_id', '=', $id)->first();

        $objectives = DB::table('course_objectives')->where('course_id', '=', $id)->get();

        $outcomes = DB::table('course_outcomes')->where('course_id', '=', $id)->get();

        $program_outcomes = DB::table('program_outcomes')->where('po_dep', '=', $dep_code)->get();

        $pdf = Pdf::loadView('pdf',compact('department','course','rational','objectives','outcomes','program_outcomes'));
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('course_profile.pdf');
    }
}
