<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    protected $table = 'User_address';


    protected $fillable = [
        'user_id',
        'address_line1',
        'address_line2',
        'subdistrict',
        'district',
        'province',
        'postalcode',
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
