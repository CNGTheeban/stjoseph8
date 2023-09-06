<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Student extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table
        Schema::create('student', function (Blueprint $table) {
            $table->id('student_id');
            $table->text('student_userid');
            $table->text('student_admissionNo');
            $table->text('student_firstName');
            $table->text('student_lastName');
            $table->text('student_DOB');
            $table->text('student_currentGrade');
            $table->text('student_status');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop table
        Schema::drop('student');
    }
}
