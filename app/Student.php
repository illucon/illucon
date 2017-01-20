<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    
    use SoftDeletes;
    protected $table = 'students';
    protected $dates = ['deleted_at'];
    protected $fillable = ['sid', 'first_name', 'last_name', 'gender', 'group', 'religion', 'class', 'section', 'academic_year', 'image' ];
    
    
    public function studentDetailed()
    {
        return $this->hasOne('App\StudentDetailed');
//        return $this->hasOne('App\Phone', 'foreign_key', 'local_key');
    }
    
    public function class_name() {
        return $this->belongsTo('App\Models\Classes\ClassName', 'class_name_id');
    }
    
    
    
    
}
