<?php

namespace App\Models;

use App\Models\Girl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $guarded = [''];

  public function girls()
  {
    return $this->hasMany(Girl::class);
  }
}
