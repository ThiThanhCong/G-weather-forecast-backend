<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('weather_reports', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('report_date');
            $table->decimal('temperature', 8, 2);
            $table->decimal('wind_speed',8,2);
            $table->integer('humidity');
            $table->string('condition_icon');
            $table->string('condition_text'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weather_reports');
    }
};
