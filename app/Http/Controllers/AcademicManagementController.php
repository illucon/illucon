<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassName;
use App\SectionName;

class AcademicManagementController extends Controller {

    public function class_management() {
        $classes = ClassName::all();
        return view('admin.pages.academic_management.class_management', compact('classes'));
    }

    public function add_class(Request $request) {
        $class = new ClassName;
        $class->class_name = $request->class_name;
        $class->save();
        return redirect('/class-management')->with('success', 'Successfully addes new Class');
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
        
    }

}
