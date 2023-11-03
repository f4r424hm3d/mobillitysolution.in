<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('blog_categories', function (Blueprint $table) {
      $table->id();
      $table->string('category_name', 200);
      $table->string('category_slug', 200);
      $table->text('shortnote')->nullable();
      $table->string('thumbnail_name', 200)->nullable();
      $table->text('thumbnail_path')->nullable();
      $table->boolean('status')->default(1);
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
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('blog_categories');
  }
};
