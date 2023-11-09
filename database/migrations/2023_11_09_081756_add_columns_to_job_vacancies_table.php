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
    Schema::table('job_vacancies', function (Blueprint $table) {
      $table->text('meta_title')->nullable()->after('status');
      $table->text('meta_keyword')->nullable()->after('meta_title');
      $table->longText('meta_description')->nullable()->after('meta_keyword');
      $table->text('page_content')->nullable()->after('meta_description');
      $table->integer('seo_rating')->nullable()->after('page_content');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('job_vacancies', function (Blueprint $table) {
      //
    });
  }
};
