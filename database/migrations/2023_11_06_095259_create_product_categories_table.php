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
    Schema::create('product_categories', function (Blueprint $table) {
      $table->id();
      $table->string('category_name');
      $table->string('category_slug');
      $table->string('thumbnail_name')->nullable();
      $table->text('thumbnail_path')->nullable();
      $table->text('shortnote')->nullable();
      $table->longText('description')->nullable();
      $table->text('meta_title')->nullable();
      $table->text('meta_keyword')->nullable();
      $table->longText('meta_description')->nullable();
      $table->text('page_content')->nullable();
      $table->integer('seo_rating')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('product_categories');
  }
};
