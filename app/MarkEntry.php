<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarkEntry extends Model
{

    use SoftDeletes;

    protected $table = 'mark_entries';
    protected $dates = ['deleted_at'];

   protected $fillable = ['written_mark', 'oral_mark', 't1_mark', 't2_mark'];
}
