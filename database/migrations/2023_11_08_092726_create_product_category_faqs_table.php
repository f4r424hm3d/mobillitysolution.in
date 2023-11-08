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
    Schema::create('product_category_faqs', function (Blueprint $table) {
      $table->id();
      $table->string('question');
      $table->longText('answer')->nullable();
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
    Schema::dropIfExists('product_category_faqs');
  }
};
