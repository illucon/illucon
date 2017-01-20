<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamName extends Model
{

    use SoftDeletes;

    protected $table = 'exam_names';
    protected $dates = ['deleted_at'];

   protected $fillable = ['total_classes', 'status'];
}
