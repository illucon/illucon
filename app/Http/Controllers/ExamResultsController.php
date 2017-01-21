<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\ExamType;
use App\ExamName;
use App\ClassName;
use App\AcademicYear;

class ExamResultsController extends Controller {

    public function grade_setting() {
        $grade = Grade::all();
        return view('admin.pages.exam_results.grade_setting', compact('grade'));
    }

    public function add_grade(Request $request) {
        $grade = new Grade;
        $grade->marks_from = $request->marks_from;
        $grade->marks_to = $request->marks_to;
        $grade->grade = $request->grade;
        $grade->grade_point = $request->grade_point;
        $grade->remark = $request->remark;
        $grade->save();

        return back()->with('success', 'Successfully Added');
    }

    public function exam_type() {
        $exam_type = ExamType::all();
        return view('admin.pages.exam_results.exam_type', compact('exam_type'));
    }

    public function add_exam_type(Request $request) {
        $exam_type = new ExamType;
        $exam_type->exam_type = $request->exam_type;
        $exam_type->save();

        return back()->with('success', 'Successfully Added');
    }

    public function exams() {
        $exam_type = ExamType::all();
        $class_name = ClassName::all();
        $academic_year = AcademicYear::all();
        $exam_name = ExamName::all();
        return view('admin.pages.exam_results.exam_name', compact('exam_name', 'exam_type', 'class_name', 'academic_year'));
    }

    public function add_new_exam(Request $request) {
        $exam_name = new ExamName;
        $exam_name->exam_name = $request->exam_name;
        $exam_name->exam_types_id = $request->exam_types_id;
        $exam_name->percentage_for_final = $request->percentage_for_final;
        $exam_name->class_start_from = $request->class_start_from;
        $exam_name->class_end_to = $request->class_end_to;
        $exam_name->total_classes = $request->total_classes;
        $exam_name->class_names_id = $request->class_names_id;
        $exam_name->academic_years_id = $request->academic_years_id;
        $exam_name->status = $request->status;
        $exam_name->save();

        return back()->with('success', 'Successfully Added');
    }

}
