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
    Schema::create('product_sub_categories', function (Blueprint $table) {
      $table->id();
      $table->string('sub_category_name');
      $table->string('sub_category_slug');
      $table->string('thumbnail_name')->nullable();
      $table->text('thumbnail_path')->nullable();
      $table->text('shortnote')->nullable();
      $table->longText('description')->nullable();
      $table->unsignedBigInteger('category_id');
      $table->foreign('category_id')->references('id')->on('product_categories')->cascadeOnDelete()->cascadeOnUpdate();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('product_sub_categories');
  }
};
