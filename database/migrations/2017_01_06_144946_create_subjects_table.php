<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_names_id')->unsigned();
            $table->foreign('class_names_id')->references('id')->on('class_names');
            
            $table->string('subject_name');
            $table->string('class_name'); //will be removed
            $table->string('section_name'); //will be removed
            
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
        Schema::dropIfExists('subjects');
    }
}
