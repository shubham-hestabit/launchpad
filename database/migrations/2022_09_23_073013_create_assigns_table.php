<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('a_id');
            $table->unsignedBigInteger('stud_id');
            $table->unsignedBigInteger('assigned_teacher_id');
            $table->foreign('a_id')->references('a_id')->on('admins');
            $table->foreign('stud_id')->references('s_id')->on('students');
            $table->foreign('assigned_teacher_id')->references('t_id')->on('teachers');
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
        Schema::dropIfExists('assigns');
    }
}
