<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentDetailed extends Model
{
    use SoftDeletes;
     protected $table = 'student_detaileds';
    protected $dates = ['deleted_at'];
    protected $fillable = ['student_id','transport', 'dob',  'birth_certificate', 'blood_group', 'last_school', 'father_name', 'father_education', 'father_occupation', 'father_nid', 'father_phone', 'father_email', 'mother_name', 'mother_education', 'mother_occupation', 'mother_nid', 'mother_phone', 'mother_email', 'guardian_name', 'guardian_email', 'relation', 'guardian_phone', 'present_address', 'permanent_address'];
    
    public function student()
    {
        return $this->belongsTo('App\Student');
//        return $this->belongsTo('App\User', 'foreign_key', 'other_key');
    }
}
