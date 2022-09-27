<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id('a_id');
            $table->string('a_name', 100);
            $table->string('a_email', 150);
            $table->string('a_password', 50);
            $table->unsignedBigInteger('main_id');
            $table->foreign('main_id')->references('id')->on('mains');
            $table->integer('approval_status');
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
        Schema::dropIfExists('admin');
    }
}
