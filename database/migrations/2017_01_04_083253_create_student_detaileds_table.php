<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentDetailedsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('student_detaileds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('students_id')->unsigned();
            $table->foreign('students_id')->references('id')->on('students');
            
            $table->string('transport', 50);
            $table->string('dob', 50);
            $table->string('birth_certificate', 50);
            $table->string('blood_group', 50);
            $table->text('last_school');
            
            $table->string('father_name', 255);
            $table->string('father_education', 100);
            $table->string('father_occupation', 100);
            $table->string('father_nid', 50);
            $table->string('father_phone', 50);
            $table->string('father_email', 100);
            
            $table->string('mother_name', 255);
            $table->string('mother_education',100);
            $table->string('mother_occupation', 100);
            $table->string('mother_nid', 50);
            $table->string('mother_phone', 50);
            $table->string('mother_email', 100);
            
            $table->string('guardian_name', 255);
            $table->string('guardian_email', 100);
            $table->string('relation', 50);
            $table->string('guardian_phone', 50);
            $table->text('present_address');
            $table->text('permanent_address');
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('student_detaileds');
    }

}
