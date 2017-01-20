<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarkEntriesTable extends Migration
{
    /**
     * Run the migrations. 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('class_names_id')->references('id')->on('class_names');
            $table->string('section_names_id');
            $table->string('subjects_id');
            $table->string('academic_years_id');
            $table->string('exam_names_id');
            $table->string('students_id');
            
            $table->string('written_mark');
            $table->string('oral_mark');
            $table->string('t1_mark');
            $table->string('t2_mark');

            
            $table->string('created_by', 255 )->default('user_from_session');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mark_entries');
    }
}
