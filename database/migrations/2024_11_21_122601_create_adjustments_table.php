<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('adjustments', function (Blueprint $table) {
            $table->id();
            $table->integer('seed_input_date');  // Numeric value
            $table->date('seed_input_calendar'); // Date value
            $table->integer('seed_response_date'); // Numeric value
            $table->date('seed_response_calendar'); // Date value
            $table->integer('insta_visitor_adjustment');  // Numeric value
            $table->date('insta_visitor_calendar'); // Date value
            $table->integer('facebook_visitor_adjustment');  // Numeric value
            $table->date('facebook_visitor_calendar'); // Date value
            $table->integer('site_session_total_adjustment'); // Numeric value
            $table->date('site_session_calendar'); // Date value
            $table->integer('site_engagement_adjustment'); // Numeric value
            $table->date('site_engagement_calendar'); // Date value
            $table->integer('site_device_iphone_adjustment'); // Numeric value
            $table->date('site_device_iphone_calendar'); // Date value
            $table->integer('site_device_android_adjustment'); // Numeric value
            $table->date('site_device_android_calendar'); // Date value
            $table->integer('site_pc_adjustment'); // Numeric value
            $table->date('site_pc_calendar'); // Date value
            $table->timestamps();  // Created and Updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adjustments');
    }
};
