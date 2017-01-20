<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicYear extends Model
{

    use SoftDeletes;

    protected $table = 'academic_years';
    protected $dates = ['deleted_at'];

//    protected $fillable = ['***'];
}
