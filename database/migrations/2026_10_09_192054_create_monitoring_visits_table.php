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
        Schema::create('monitoring_visits', function (Blueprint $table) { 
            $table->id();

            $table->foreignId('planting_activity_id')
                ->constrained('planting_activities')
                ->restrictOnDelete();

            $table->date('monitoring_date');

            $table->unsignedInteger('number_alive');
            $table->unsignedInteger('number_dead');
            $table->unsignedInteger('number_missing');

            $table->string('health_status');
            $table->string('cause_of_death')->nullable();
            $table->text('notes')->nullable();

            $table->foreignId('created_by')
                ->constrained('users')
                ->restrictOnDelete();

            $table->unique(['planting_activity_id', 'monitoring_date']); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitoring_visits'); 
    }
};