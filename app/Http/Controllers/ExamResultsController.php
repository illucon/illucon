<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;

class ExamResultsController extends Controller
{
    public function grade_setting()
    {
    	$grade=Grade::all();
    	return view('admin.pages.exam_results.grade_setting', compact('grade'));
    }
    public function add_grade(Request $request)
    {
    	$grade=new Grade;
    	$grade->marks_from = $request->marks_from;
    	$grade->marks_to = $request->marks_to;
    	$grade->grade = $request->grade;
    	$grade->grade_point = $request->grade_point;
    	$grade->remark = $request->remark;
    	$grade->save();

    	return back()->with('success', 'Successfully Added');
    }
    
}
