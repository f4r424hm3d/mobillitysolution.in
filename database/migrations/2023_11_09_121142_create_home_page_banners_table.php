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
    Schema::create('home_page_banners', function (Blueprint $table) {
      $table->id();
      $table->text('heading');
      $table->text('shortnote')->nullable();
      $table->text('banner')->nullable();
      $table->text('banner_path')->nullable();
      $table->boolean('status')->default(1);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('home_page_banners');
  }
};
