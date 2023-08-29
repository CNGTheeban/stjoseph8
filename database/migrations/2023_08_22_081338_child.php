<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Child extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table
        Schema::create('child', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->string('fullName');
            $table->string('initialName');
            $table->string('DOB');
            $table->char('childsGrade');
            $table->char('childsAdmissionNo');
            $table->integer('status');
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
        Schema::drop('child');
    }
}
