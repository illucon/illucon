<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;
    protected $table = 'subjects';
    protected $dates = ['deleted_at'];
    protected $fillable = ['written_mark', 'oral_mark', 't1_mark', 't2_mark', 'class_name', 'section_name'];
    
    public function ClassName() {
        return $this->belongsTo('App\ClassName', 'class_names_id');
    }
    
}
