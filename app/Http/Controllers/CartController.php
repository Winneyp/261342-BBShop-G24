<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\CartProduct;
use App\Models\Cart;


class CartController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $cart = $user->cart;
        $products = $cart->products()->get();

        return view('cart', compact('cart', 'products'));
    }
    


    public function addToCart(Request $request, $id)
    {
        $user = Auth::user();
        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity', 1); // Default quantity to 1 if not provided
    
        // Check if the user has a cart
        $cart = Cart::find($user->cart_id);


    
        if (!$cart) {
            // Create a new cart if it doesn't exist
            $cart = Cart::create([
                'amount' => 0, // Set initial amount
                'totalPrice' => 0.0, // Set initial total price
            ]);
    
            // Update the user with the new cart_id
            $user->cart_id = $cart->cart_id;
            $user->save();
        }
    
        // Check if the product already exists in the cart
        $cartProduct = CartProduct::where('cart_id', $cart->cart_id)
                                   ->where('product_id', $product->product_id)
                                   ->first();
    

            // Add new product to the cart
            CartProduct::create([
                'cart_id' => $cart->cart_id,
                'product_id' => $product->product_id,
                'amount' => $quantity,
            ]);
        

        // Optionally reduce stock_quantity
        $product->decrement('stock_quantity', $quantity);
    
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|integer',
            'product_id' => 'required|integer',
            'totalPrice' => 'required|integer|min:1',
        ]);

        $cartId = $request->cart_id;
        $productId = $request->product_id;
        $totalPrice = $request->totalPrice;

        $cartProduct = \DB::table('CartProduct')
            ->where('cart_id', $cartId)
            ->where('product_id', $productId)
            ->update(['amount' => $totalPrice]);

        if ($cartProduct) {
            return redirect()->back()->with('success', 'Quantity updated successfully');
        } else {
            return redirect()->back()->with('failed', 'Failed to update quantity');
        }
    }

    public function deleteItem(Request $request) 
    {
        $request->validate([
            'cart_id' => 'required|integer',
            'product_id' => 'required|integer',
        ]);

        $cartId = $request->cart_id;
        $productId = $request->product_id;

        $deleted = \DB::table('CartProduct')
            ->where('cart_id', $cartId)
            ->where('product_id', $productId)
            ->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Item deleted successfully');
        } else {
            return redirect()->back()->with('failed', 'Failed to delete item');
        }
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|integer',
            'products' => 'required|array',
        ]);

        $cartId = $request->cart_id;
        $products = $request->products;

        \DB::beginTransaction();

        try {
            foreach ($products as $product) {
                $cartProduct = \DB::table('CartProduct')
                    ->where('cart_id', $cartId)
                    ->where('product_id', $product['id'])
                    ->first();

                if ($cartProduct) {
                    \DB::table('Product')
                        ->where('id', $product['id'])
                        ->decrement('stock_quantity', $cartProduct->quantity);
                }
            }

            \DB::table('CartProduct')
                ->where('cart_id', $cartId)
                ->delete();

            \DB::commit();

            return redirect()->back()->with('success', 'Checkout successful, stock updated and cart cleared.');
        } catch (\Exception $e) {
            \DB::rollback();
            return redirect()->back()->with('failed', 'Checkout failed: ' . $e->getMessage());
        }
    }
}