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
        Schema::create('planting_activities', function (Blueprint $table) {
          $table->id();

          $table->foreignId('planting_site_id')
                ->constrained('planting_sites')
                ->restrictOnDelete();

          $table->foreignId('species_id')
                ->constrained('species')
                ->restrictOnDelete();

          $table->date('planting_date');

          $table->unsignedInteger('number_planted');

           $table->string('planting_team')->nullable();

           $table->text('notes')->nullable();

           $table->foreignId('created_by')
                 ->constrained('users')
                  ->restrictOnDelete();
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planting_activities');
    }
};
