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
    Schema::table('users', function (Blueprint $table) {
      $table->string('slug')->nullable()->after('name');
      $table->string('designation')->nullable()->after('slug');
      $table->longText('experience_description')->nullable()->after('designation');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('users', function (Blueprint $table) {
      $table->dropColumn('slug');
      $table->dropColumn('designation');
      $table->dropColumn('experience_description');
    });
  }
};
