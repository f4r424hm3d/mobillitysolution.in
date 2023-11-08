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
    Schema::create('teams', function (Blueprint $table) {
      $table->id();
      $table->string('name', 100);
      $table->string('designation', 100);
      $table->text('photo');
      $table->text('photo_path');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('teams');
  }
};
