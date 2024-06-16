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
    Schema::create('reports', function (Blueprint $table) {
      $table->id();
      $table->string('girl_id');
      $table->string('order_id');
      $table->string('customer_name');
      $table->string('phone_number');
      $table->string('girl_name');
      $table->string('country');
      $table->string('time');
      $table->string('day_night')->nullable();
      $table->string('price');
      $table->string('state');
      $table->string('order_date');
      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('reports');
  }
};
