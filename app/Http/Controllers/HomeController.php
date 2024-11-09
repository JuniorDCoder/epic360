<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        return Inertia::render('Welcome',[
            'categories' => Category::all(),
            'latestProducts' => Product::latest()->take(3)->get()
        ]);
    }

    public function shop()
    {
        $products = Product::with('category')->paginate(9);
        $categories = Category::all();

        return Inertia::render('Shop/Shop', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
    public function productDetails($id){
        $product = Product::with(['images', 'category', 'reviews'])->findOrFail($id);
        return inertia::render('Shop/SingleProduct', [
            'product' => $product
        ]);
    }

    public function myAccount(){
        return Inertia::render('MyAccount');
    }
}
