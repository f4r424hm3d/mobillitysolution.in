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
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->string('product_name');
      $table->string('product_slug');
      $table->string('thumbnail_name')->nullable();
      $table->text('thumbnail_path')->nullable();
      $table->text('shortnote')->nullable();
      $table->longText('description')->nullable();
      $table->unsignedBigInteger('category_id');
      $table->foreign('category_id')->references('id')->on('product_categories')->cascadeOnDelete()->cascadeOnUpdate();
      $table->unsignedBigInteger('sub_category_id');
      $table->foreign('sub_category_id')->references('id')->on('product_sub_categories')->cascadeOnDelete()->cascadeOnUpdate();
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
    Schema::dropIfExists('products');
  }
};
