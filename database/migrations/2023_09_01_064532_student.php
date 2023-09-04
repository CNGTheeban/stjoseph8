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
            $table->id();
            $table->text('userid');
            $table->text('admissionNo');
            $table->text('firstName');
            $table->text('lastName');
            $table->text('DOB');
            $table->text('currentGrade');
            $table->text('status');
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
