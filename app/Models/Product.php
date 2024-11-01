<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'Product';

    protected $primaryKey = 'product_id';
    
    public $timestamps = false;
    protected $fillable = [
        'cat_id',
        'price',
        'size',
        'color',
        'picture',
        'name',
        'stock_quantity',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'cat_id');
    }

    public function categoryName()
    {
        return $this->belongsTo(ProductCategory::class, 'catagoryname');
    }

    public function wishlists()
    {
        return $this->belongsToMany(Wishlist::class, 'WishlistProduct', 'product_id', 'wishlist_id')
                    ->withPivot('wishlist_product_id')
                    ->withTimestamps();
    }

    public function carts()
    {
        return $this->belongsToMany(Wishlist::class, 'WishlistProduct', 'product_id', 'wishlist_id')
                    ->withPivot('wishlist_product_id')
                    ->withTimestamps();
    }
}
