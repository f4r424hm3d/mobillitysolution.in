<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;
  public function category()
  {
    return $this->hasOne(ProductCategory::class, 'id', 'category_id');
  }
  public function subCategory()
  {
    return $this->hasOne(ProductSubCategory::class, 'id', 'sub_category_id');
  }
  public function contents()
  {
    return $this->hasMany(ProductContent::class, 'product_id', 'id');
  }
  public function photos()
  {
    return $this->hasMany(ProductGallery::class, 'product_id', 'id');
  }
  public function faqs()
  {
    return $this->hasMany(ProductFaq::class, 'product_id', 'id');
  }
}
