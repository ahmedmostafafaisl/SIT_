<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('notes_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('notes_id')->references('id') ->on('notes');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('notes_users');
    }
};
