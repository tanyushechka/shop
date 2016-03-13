<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public function products() {
        return $this->belongsToMany('App\Product', 'products_product_categories', 'category_id', 'product_id');
    }
}
