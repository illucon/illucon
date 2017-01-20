<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;
    protected $table = 'subjects';
    protected $dates = ['deleted_at'];
    
    public function class_name() {
        return $this->belongsTo('App\Models\Classes\ClassName', 'class_name_id');
    }
    
}
