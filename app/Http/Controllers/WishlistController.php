<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $wishlist = $user->wishlist;
        $products = $wishlist->products()->get();

        return view('wishlist', compact('wishlist', 'products'));
    }
}