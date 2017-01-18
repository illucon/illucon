<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionName extends Model {

    use SoftDeletes;

    protected $table = 'section_names';
    protected $dates = ['deleted_at'];

    public function class_name() {
        return $this->belongsTo('App\ClassName', 'class_name_id');
    }

}
