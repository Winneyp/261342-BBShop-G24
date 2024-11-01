<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'Wishlist';

    protected $primaryKey = 'wishlist_id';
    
    public $timestamps = false;
    protected $fillable = [
        'date_added',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'WishlistProduct', 'wishlist_id', 'product_id')
                    ->withPivot('wishlist_product_id')
                    ->withTimestamps();
    }
}
