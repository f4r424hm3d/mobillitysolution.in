<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
  use HasFactory;
  public function category()
  {
    return $this->hasOne(ProductCategory::class, 'id', 'category_id');
  }
  public function products()
  {
    return $this->hasMany(Product::class, 'sub_category_id', 'id');
  }
  public function faqs()
  {
    return $this->hasMany(ProductSubCategoryFaq::class, 'sub_category_id', 'id');
  }
}
