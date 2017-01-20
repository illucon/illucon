<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamType extends Model
{

    use SoftDeletes;

    protected $table = 'exam_types';
    protected $dates = ['deleted_at'];

//    protected $fillable = ['***'];
    
}
