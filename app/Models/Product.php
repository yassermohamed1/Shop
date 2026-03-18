<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;


class Product extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'slug', 'description', 'compare_price', 'price', 'category_id', 'quantity', 'image', 'active'];
  public function category()
  {
    return $this->belongsTo(Category::class, 'category_id', 'id');
  }
  public function scopeActive(Builder $builder)
  {
    return $builder->where('active', true);
  }
  // Acceesore
  public function getImageUrlAttribute()
  {
    //   return asset('upload/product-1.jpg');
    // }
    if (Str::startsWith($this->image, ["http://", 'https://'])) {
      return $this->image;
    }
    return asset('storage/' . $this->image);
  }
  public function getPricePrecentAttribute()
  {
    if (!$this->compare_price) {
      return 0;
    }
    return round(100 - (100 * $this->price / $this->compare_price), 2);
  }
  public function getNewAttribute()
  {
    if (!$this->compare_price) {
      return 'new';
    }
  }
}
