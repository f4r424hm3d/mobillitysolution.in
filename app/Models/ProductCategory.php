<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
  use HasFactory;
  public function getAllSubCategory()
  {
    return $this->hasMany(ProductSubCategory::class, 'category_id', 'id');
  }
  public function getAllProduct()
  {
    return $this->hasMany(Product::class, 'category_id', 'id');
  }
  public function getFaqs()
  {
    return $this->hasMany(ProductCategoryFaq::class, 'category_id', 'id');
  }
}
