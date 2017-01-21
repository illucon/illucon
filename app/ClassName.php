<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassName extends Model {

    use SoftDeletes;

    protected $table = 'class_names';
    protected $dates = ['deleted_at'];

//    protected $fillable = ['***'];

    public function section() {
        return $this->hasMany('App\SectionName', 'class_name_id');
    }

    public function student() {
        return $this->hasMany('App\Student', 'class_name_id');
    }
    public function subject() {
        return $this->hasMany('App\Subject', 'class_name_id');
    }

}
