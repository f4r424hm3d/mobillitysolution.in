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
    Schema::create('leads', function (Blueprint $table) {
      $table->id();
      $table->string('name', 100);
      $table->string('email', 150);
      $table->string('mobile', 20);
      $table->text('subject')->nullable();
      $table->text('message')->nullable();
      $table->unsignedBigInteger('category_id')->nullable();
      $table->foreign('category_id')->references('id')->on('product_categories')->cascadeOnDelete();
      $table->unsignedBigInteger('sub_category_id')->nullable();
      $table->foreign('sub_category_id')->references('id')->on('product_sub_categories')->cascadeOnDelete();
      $table->unsignedBigInteger('product_id')->nullable();
      $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
      $table->string('source')->nullable();
      $table->text('source_path')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('leads');
  }
};
