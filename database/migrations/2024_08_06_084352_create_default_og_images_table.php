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
    Schema::create('default_og_images', function (Blueprint $table) {
      $table->id();
      $table->string('page', 200);
      $table->string('file_name', 200);
      $table->text('file_path');
      $table->boolean('default')->default(1);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('default_og_images');
  }
};
