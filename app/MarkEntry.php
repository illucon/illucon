<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarkEntry extends Model {

    use SoftDeletes;

    protected $table = 'mark_entries';
    protected $dates = ['deleted_at'];
    protected $fillable = ['written_mark', 'oral_mark', 't1_mark', 't2_mark'];

    public function ClassName() {
        return $this->belongsTo('App\ClassName', 'class_names_id');
    }

    public function ExamName() {
        return $this->belongsTo('App\ExamName', 'exam_names_id');
    }

    public function Subject() {
        return $this->belongsTo('App\Subject', 'subjects_id');
    }

    public function Year() {
        return $this->belongsTo('App\AcademicYear', 'academic_years_id');
    }

}
