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
    Schema::table('blogs', function (Blueprint $table) {
      $table->string('image_name', 200)->nullable()->after('thumbnail_path');
      $table->text('image_path')->nullable()->after('image_name');
      $table->bigInteger('views')->nullable()->after('image_path');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('blogs', function (Blueprint $table) {
      //
    });
  }
};
