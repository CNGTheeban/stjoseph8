<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Donation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table
        Schema::create('donation', function (Blueprint $table) {
            $table->id();
            $table->text('firstName');
            $table->text('lastName');
            $table->text('email');
            $table->text('contactno');
            $table->text('donerRef');
            $table->text('amount');
            $table->text('receiverRef')->nullable();
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
        Schema::drop('donation');
    }
}
