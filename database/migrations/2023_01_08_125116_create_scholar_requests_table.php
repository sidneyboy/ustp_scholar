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
        Schema::create('scholar_requests', function (Blueprint $table) {
            $table->id();
            $table->Integer('scholar_id');
            $table->Integer('request_name');
            $table->Integer('request_details');
            $table->Integer('request_type');
            $table->Integer('request_date');
            $table->Integer('status')->nullable();
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
        Schema::dropIfExists('scholar_requests');
    }
};
