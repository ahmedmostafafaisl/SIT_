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
        Schema::create('notes_employees', function (Blueprint $table) {
            $table->id();
 $table->unsignedBigInteger('employees_id');
            $table->unsignedBigInteger('notes_id');
            $table->foreign('employees_id')->references('id')->on('employees');
            $table->foreign('notes_id')->references('id') ->on('notes');
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
        Schema::dropIfExists('notes_employees');
    }
};
