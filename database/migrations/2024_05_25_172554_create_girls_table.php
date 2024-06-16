<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('girls', function (Blueprint $table) {
      $table->id();
      $table->string('country');
      $table->string('name');
      $table->string('profile_photo');
      $table->string('age');
      $table->string('height');
      $table->string('type')->nullable();
      $table->string('girl_commission')->nullable();
      $table->longText('get_service')->nullable();
      $table->longText('description')->nullable();
      $table->string('description_photo_one')->nullable();
      $table->string('description_photo_two')->nullable();
      $table->string('description_photo_three')->nullable();
      $table->string('description_photo_four')->nullable();
      $table->string('price')->nullable();
      $table->string('time')->nullable();
      $table->string('video')->nullable();
      $table
        ->string('status')
        ->nullable()
        ->default('on');
      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('girls');
  }
};
