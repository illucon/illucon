<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamName extends Model
{

    use SoftDeletes;

    protected $table = 'exam_names';
    protected $dates = ['deleted_at'];

   protected $fillable = ['percentage_for_final', 'total_classes'];
   
   public function ClassName() {
        return $this->belongsTo('App\ClassName', 'class_names_id');
    }
   public function ExamType() {
        return $this->belongsTo('App\ExamType', 'exam_types_id');
    }
   public function AcademicYear() {
        return $this->belongsTo('App\AcademicYear', 'academic_years_id');
    }
}
