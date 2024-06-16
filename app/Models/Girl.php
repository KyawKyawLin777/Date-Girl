<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Girl extends Model
{
  use HasFactory;
  use softDeletes;

  protected $guarded = [''];

  public function category()
  {
    return $this->belongsTo(Category::class, 'country');
  }

  public function time_prices()
  {
    return $this->hasMany(TimePrice::class, 'girlid');
  }

  public function orders()
  {
    return $this->hasMany(Order::class, 'girl_id');
  }
}
