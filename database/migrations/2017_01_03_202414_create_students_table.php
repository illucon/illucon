<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_names_id')->unsigned();
            $table->foreign('class_names_id')->references('id')->on('class_names');
            //calss role to be added
            $table->integer('sid');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('gender', 10);
            $table->string('group', 10);
            $table->string('religion', 10);
            $table->string('class', 20);//to be deleted
            $table->string('section', 20);   //to be renamed and constrained by foreign key
            $table->string('academic_year', 20);
            $table->string('image', 255 )->default('student_image/user.png');
            
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
        Schema::dropIfExists('students');
    }
}
