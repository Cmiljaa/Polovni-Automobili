<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('transmission');
            $table->integer('power');
            $table->string('drive_system');
            $table->integer('door_count');
            $table->integer('number_of_seats');
            $table->integer('cubic_capacity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn(['transmission', 'power', 'drive_system', 'door_count', 'number_of_seats', 'cubic_capacity']);
        });
    }
};
