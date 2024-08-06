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
    Schema::table('teams', function (Blueprint $table) {
      $table->string('email')->nullable()->after('name');
      $table->string('mobile')->nullable()->after('email');
      $table->string('profile_picture')->nullable()->after('mobile');
      $table->string('department')->nullable()->after('profile_picture');
      $table->string('branch')->nullable()->after('department');
      $table->string('experience_short')->nullable()->after('branch');
      $table->text('languages')->nullable()->after('experience_short');
      $table->longText('highlights')->nullable()->after('languages');
      $table->longText('experiance')->nullable()->after('highlights');
      $table->longText('education')->nullable()->after('experiance');
      $table->longText('shortnote')->nullable()->after('education');
      $table->unsignedBigInteger('working_status')->nullable()->after('education');
      $table->foreign('working_status')->references('id')->on('employee_statuses')->nullOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('teams', function (Blueprint $table) {
      $table->dropForeign(['working_status']);
      $table->dropColumn([
        'email',
        'mobile',
        'profile_picture',
        'department',
        'branch',
        'experience_short',
        'languages',
        'highlights',
        'experiance',
        'education',
        'shortnote',
        'working_status',
      ]);
    });
  }
};
