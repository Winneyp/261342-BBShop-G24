<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'Product_catagory';

    public function products()
    {
        return $this->hasMany(Product::class, 'cat_id');
    }
}
