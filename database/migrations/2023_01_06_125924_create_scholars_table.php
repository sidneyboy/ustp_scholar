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
        Schema::create('scholars', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('birthday')->nullable();
            $table->string('age')->nullable();
            $table->string('address')->nullable();
            $table->string('number')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('status')->nullable();
            $table->string('course')->nullable();
            $table->string('semester_start')->nullable();
            $table->string('semester_end')->nullable();
            $table->string('school_year_start')->nullable();
            $table->string('school_year_end')->nullable();
            $table->string('school')->nullable();
            $table->string('year_level')->nullable();
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
        Schema::dropIfExists('scholars');
    }
};
