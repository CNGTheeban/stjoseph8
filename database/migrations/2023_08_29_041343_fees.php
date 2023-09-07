<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id('fee_id');
            $table->integer('fee_studentid');
            $table->string('fee_term');
            $table->string('fee_currentClass');
            $table->string('fee_purpose');
            $table->double('fee_amount');
            $table->integer('fee_status');
            $table->timestamp('fee_created_at')->useCurrent()->nullable();
            $table->timestamp('fee_updated_at')->useCurrent()->nullable();
            $table->softDeletes($column = 'fee_deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fees');
    }
}
