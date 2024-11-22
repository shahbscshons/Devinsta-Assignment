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
    Schema::create('insta_adjustments', function (Blueprint $table) {
        $table->id();
        $table->string('field_name'); // To store the name of the field (e.g., Seed Input, Seed Response, etc.)
        $table->integer('value'); // To store the numeric value
        $table->date('date'); // To store the selected date
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insta_adjustments');
    }
};
