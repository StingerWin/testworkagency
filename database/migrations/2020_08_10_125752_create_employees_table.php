<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->string('photo')->nullable();
            $table->bigInteger('position_id')->unsigned()->nullable();
            $table->date('date');
            $table->string('phone_number');
            $table->string('email');
            $table->bigInteger('head_id')->unsigned()->nullable();
            $table->string('salary');
            $table->integer('created_user_id')->unsigned()->nullable();
            $table->integer('updated_user_id')->unsigned()->nullable();

            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->foreign('head_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('created_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('employees');
    }
}
