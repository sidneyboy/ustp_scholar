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
        Schema::table('Grades', function (Blueprint $table) {
            $table->string('midterm')->nullable();
            $table->string('final')->nullable();
            $table->string('section')->nullable();
            $table->string('remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Grades', function (Blueprint $table) {
            $table->dropColumn('midterm')->nullable();
            $table->dropColumn('final')->nullable();
            $table->dropColumn('section')->nullable();
            $table->dropColumn('remarks')->nullable();
        });
    }
};
