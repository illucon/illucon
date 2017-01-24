<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\ExamType;
use App\ExamName;
use App\ClassName;
use App\AcademicYear;
use App\SectionName;
use App\Subject;
use App\Student;
use App\MarkEntry;

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

    public function mark_entries() {
        $class_name = ClassName::all();
        $academic_year = AcademicYear::all();
        return view('admin.pages.exam_results.mark_entry', compact('class_name', 'academic_year'));
    }

    public function ajax_view_section(Request $request) {
        if ($request->ajax()) {
            $id = $request->id;

            $section = SectionName::where('class_names_id', $id)->get();
            view()->share('class_to_section', $section);
            $view1 = view('admin.pages.ajax_options.section')->render();

            $subject = Subject::where('class_names_id', $id)->get();
            view()->share('class_to_subject', $subject);
            $view2 = view('admin.pages.ajax_options.subject')->render();

            $exam_name = ExamName::where('class_names_id', $id)->get();
            view()->share('class_to_exam_name', $exam_name);
            $view3 = view('admin.pages.ajax_options.exam_name')->render();

            $info['res1'] = $view1;
            $info['res2'] = $view2;
            $info['res3'] = $view3;

            return response()->json($info);
        }
    }

    public function mark_entry_by_class(Request $request) {
        $year = AcademicYear::find($request->academic_years_id);
        $class = ClassName::find($request->class_names_id);
        $subject = Subject::find($request->subjects_id);
        $exam_name = ExamName::find($request->exam_names_id);
        $section = SectionName::find($request->section_names_id);

        $section_id = $request->section_names_id;
        $students = Student::where('section', $section_id)->get();

        return view('admin.pages.exam_results.mark_entry_by_class', compact('students', 'year', 'class', 'subject', 'exam_name', 'section'));
    }

    public function save_mark_entry_by_class(Request $request) {
        $exam_names_id = $request->exam_names_id;
        $subject_id = $request->subjects_id;
        $total = ($request->total);  //total entry + 1(last increment)

        for ($i = 0; $i < $total; $i++) {
            $mark_entry = new MarkEntry;
            $mark_entry->exam_names_id = $exam_names_id;
            $mark_entry->subjects_id = $subject_id;
            $mark_entry->students_id = $request->students_id[$i];
            $mark_entry->written_mark = $request->written_mark[$i];
            $mark_entry->oral_mark = $request->oral_mark[$i];
            $mark_entry->t1_mark = $request->t1_mark[$i];
            $mark_entry->t2_mark = $request->t2_mark[$i];
            $mark_entry->save();
        }
        return redirect('/mark-entries')->with('success', 'Successfully Updated Marks to the Section');
    }

}
