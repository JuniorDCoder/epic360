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
        return Inertia::render('Shop/Shop', [
            "products" => Product::paginate(9)
        ]);
    }
    public function productDetails($id){
        $product = Product::with(['images', 'category', 'reviews'])->findOrFail($id);
        return inertia::render('Shop/SingleProduct', [
            'product' => $product
        ]);
    }
}
