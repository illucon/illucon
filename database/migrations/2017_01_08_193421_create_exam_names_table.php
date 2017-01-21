<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_names', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_types_id')->unsigned();
            $table->foreign('exam_types_id')->references('id')->on('exam_types');
            $table->integer('class_names_id')->unsigned();
            $table->foreign('class_names_id')->references('id')->on('class_names');
            $table->integer('academic_years_id')->unsigned();
            $table->foreign('academic_years_id')->references('id')->on('academic_years');

            $table->string('exam_name');
            $table->string('class_start_from');
            $table->string('class_end_to');
            $table->string('total_classes');
            $table->string('percentage_for_final');
            $table->string('status');

            
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
        Schema::dropIfExists('exam_names');
    }
}
