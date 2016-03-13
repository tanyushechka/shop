<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   public function  categories() {
       return $this->belongsToMany('App\ProductCategory', 'products_product_categories', 'product_id', 'category_id');
   }
}
