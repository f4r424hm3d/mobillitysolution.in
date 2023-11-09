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
    Schema::create('job_vacancies', function (Blueprint $table) {
      $table->id();
      $table->string('designation', 200);
      $table->string('location', 200);
      $table->string('no_of_position', 200);
      $table->date('last_date');
      $table->string('job_type', 200);
      $table->string('experience', 100);
      $table->longText('description');
      $table->boolean('status')->default(1);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('job_vacancies');
  }
};
