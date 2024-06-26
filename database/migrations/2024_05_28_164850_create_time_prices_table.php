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
    Schema::create('time_prices', function (Blueprint $table) {
      $table->id();
      $table->string('girlid')->nullable();
      $table->string('price')->nullable();
      $table->string('time')->nullable();
      // $table->string('day_night')->nullable();
      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('time_prices');
  }
};
