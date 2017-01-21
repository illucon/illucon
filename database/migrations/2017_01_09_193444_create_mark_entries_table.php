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
            $table->integer('class_names_id')->unsigned();
            $table->foreign('class_names_id')->references('id')->on('class_names');
            $table->integer('section_names_id')->unsigned();
            $table->foreign('section_names_id')->references('id')->on('section_names');
            $table->integer('subjects_id')->unsigned();
            $table->foreign('subjects_id')->references('id')->on('subjects');
            $table->integer('academic_years_id')->unsigned();
            $table->foreign('academic_years_id')->references('id')->on('academic_years');
            $table->integer('exam_names_id')->unsigned();
            $table->foreign('exam_names_id')->references('id')->on('exam_names');
            $table->integer('students_id')->unsigned();
            $table->foreign('students_id')->references('id')->on('students');
            
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
