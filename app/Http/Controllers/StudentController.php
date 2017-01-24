<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\StudentDetailed;
use App\ClassName;
use App\AcademicYear;

use App\Http\Requests\StudentInfoRequest;
use Session;

class StudentController extends Controller {

    public function new_admission() {
        $class_name = ClassName::all();
        $academic_year = AcademicYear::all();
        
        return view('admin.pages.students.new_admission', compact('class_name', 'academic_year'));
    }

    public function save_student(StudentInfoRequest $request) {
        $student = new Student;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->gender = $request->gender;
        $student->group = $request->group;
        $student->religion = $request->religion;
        $student->class_names_id = $request->class_names_id;
        $student->section = $request->section;
        $student->academic_year = $request->academic_year;

        $file = request()->file('image');
        if ($file) {
            $ext = $file->guessClientExtension();
//        $ext= strtolower($file->extention());
            $name = time() . str_random(10) . '.' . $ext;
            $path = $file->storeAs('public/student_image', $name);
            $student->image = $path; //=========image src  asset($path)
        }

        $student_detailed = new StudentDetailed;
        $student_detailed->transport = $request->transport;
        $student_detailed->dob = $request->dob;
        $student_detailed->birth_certificate = $request->birth_certificate;
        $student_detailed->blood_group = $request->blood_group;
        $student_detailed->last_school = $request->last_school;

        $student_detailed->father_name = $request->father_name;
        $student_detailed->father_education = $request->father_education;
        $student_detailed->father_occupation = $request->father_occupation;
        $student_detailed->father_nid = $request->father_nid;
        $student_detailed->father_phone = $request->father_phone;
        $student_detailed->father_email = $request->father_email;

        $student_detailed->mother_name = $request->mother_name;
        $student_detailed->mother_education = $request->mother_education;
        $student_detailed->mother_occupation = $request->mother_occupation;
        $student_detailed->mother_nid = $request->mother_nid;
        $student_detailed->mother_phone = $request->mother_phone;
        $student_detailed->mother_email = $request->mother_email;

        $student_detailed->guardian_name = $request->guardian_name;
        $student_detailed->guardian_email = $request->guardian_email;
        $student_detailed->relation = $request->relation;
        $student_detailed->guardian_phone = $request->guardian_phone;

        $p_address = $request->present_address;
        $p_city = $request->present_city;
        $p_dist = $request->present_district;
        $student_detailed->present_address = $p_address . ', ' . $p_city . ', ' . $p_dist;

        $pr_address = $request->permanent_address;
        $pr_city = $request->permanent_city;
        $pr_dist = $request->permanent_district;
        $student_detailed->permanent_address = $pr_address . ', ' . $pr_city . ', ' . $pr_dist;

        $student->save();

        $student->sid = (date('y') * 100000) + $student->id;
        $student_detailed->students_id = $student->id;

        $student->save();
        $student_detailed->save();

        Session::flash('success', 'Successfully Added');

        return back();
    }

    public function student_list() {
        $students= Student::paginate(20);
        return view('admin.pages.students.student_list', compact('students'));
    }

    public function test() {
        $image = Student::find(4);
        echo '<img src="' . asset($image->image) . '"/>';
        exit();
    }

}
