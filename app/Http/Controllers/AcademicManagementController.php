<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassName;
use App\SectionName;
use App\Subject;
use App\AcademicYear;

class AcademicManagementController extends Controller {

    public function class_management() {
        $classes = ClassName::all();
        return view('admin.pages.academic_management.class_management', compact('classes'));
    }

    public function add_class(Request $request) {
        $class = new ClassName;
        $class->class_name = $request->class_name;
        $class->save();
        return back()->with('success', 'Successfully addes new Class');
    }

    public function ajax_edit_view(Request $request) {
        if ($request->ajax()) {
            $id = $request->id;
            $class = ClassName::find($id);


            $html = '<input type = "text" name = "class_name" class = "form-control" value = "' . $class->class_name . '" >
                    <input name="id" type="hidden" value="'.$class->id.'"/>';
            $info['res']=$html;
            return response()->json($info);
        }
    }
    public function update_class(Request $request)
    {
            $id = $request->id;
            $class = ClassName::find($id);
            $class->class_name=$request->class_name;
            $class->save();
            return back()->with('success', 'Class updated Successfully');
    }
    public function delete_class(Request $request)
    {
            $id = $request->id;
            $class = ClassName::find($id);
            $class->delete();
            return back()->with('delete', 'Class deleted Successfully');

    }
    public function sections() {
        $sections= SectionName::all();
        $class_names = ClassName::all();
        
        return view('admin.pages.academic_management.section', compact('sections', 'class_names'));
    }
    public function add_section(Request $request) {
        $section_name= new SectionName;
        $section_name->class_names_id=$request->class_names_id;
        $section_name->section_name=$request->section_name;
        $section_name->save();
        
        return back()->with('success', 'Successfully Added');
    }
    public function subjects() {
        $subject= Subject::all();
        $class_names = ClassName::all();
        
        return view('admin.pages.academic_management.subject', compact('subject', 'class_names'));
    }
    public function add_subject(Request $request) {
        $subject_name= new Subject;
        $subject_name->class_names_id=$request->class_names_id;
        $subject_name->subject_name=$request->subject_name;
        $subject_name->written_mark=$request->written_mark;
        $subject_name->oral_mark=$request->oral_mark;
        $subject_name->t1_mark=$request->t1_mark;
        $subject_name->t2_mark=$request->t2_mark;
        $subject_name->save();
        
        return back()->with('success', 'Successfully Added');
    }
    public function years() {
        $years= AcademicYear::all();
        
        return view('admin.pages.academic_management.academic_year', compact('years') );
    }
    public function add_year(Request $request) {
        $year= new AcademicYear;
        $year->academic_year=$request->academic_year;
        $year->save();
        
        return back()->with('success', 'Successfully Added');
    }

}
