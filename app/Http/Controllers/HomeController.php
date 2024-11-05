<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function home() {
        return Inertia::render('Welcome');
    }

    public function shop()
    {
        return Inertia::render('Shop');
    }
}
