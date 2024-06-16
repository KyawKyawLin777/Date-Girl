<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;
  protected $guarded = [''];

  public function girl()
  {
    return $this->belongsTo(Girl::class, 'girl_id');
  }
}
