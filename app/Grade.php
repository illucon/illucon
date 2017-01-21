<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{

    use SoftDeletes;

    protected $table = 'grades';
    protected $dates = ['deleted_at'];

//    protected $fillable = ['***'];
    
    
}