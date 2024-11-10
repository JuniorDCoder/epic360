<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    public function cartDetails()
    {
        $cartItems = Cart::content();

        if(count($cartItems) === 0){
        }

        return Inertia::render('Shop/Cart',[
            'cartItems' => $cartItems,
            'count' => count($cartItems),
            'latestProducts' => Product::latest()->take(3)->get()
        ]);
    }
    public function addToCart(Product $product, Request $request){
        if($product->in_stock > 0){
            $cartData = [];
            $cartData['id'] = $product->id;
            $cartData['name'] = $product->name;
            $cartData['qty'] = $request->qty;
            $cartData['price'] = $product->giveaway_price ? $product->giveaway_price : $product->price;
            $cartData['weight'] = 10;
            $cartData['options']['image'] = $product->image;
            $cartData['options']["actual_price"] = $product->price;

            Cart::add($cartData);
            return redirect()->back();
        }
    }
    public function clearCart()
    {
        Cart::destroy();
    }

    public function getCartCount()
    {
        return response()->json(['count' => Cart::content()->count()]);
    }

    public function removeProduct($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }
    public function updateProductQty(Request $request)
    {
        $productId = Cart::get($request->rowId)->id;
        $product = Product::findOrFail($productId);

        Cart::update($request->rowId, $request->quantity);
        $productTotal = $this->getProductTotal($request->rowId);

        return redirect()->back();
    }

    public function getProductTotal($rowId)
    {
       $product = Cart::get($rowId);
       $total = ($product->price + $product->options->variants_total) * $product->qty;
       return $total;
    }
}
