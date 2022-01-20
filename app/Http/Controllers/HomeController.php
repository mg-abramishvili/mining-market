<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Review;
use App\Models\Advantage;
use App\Models\Product;
use App\Models\Scheme;
use App\Models\About;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::find(1);
        $products = Product::take(4)->get();
        return view('home', compact('hero', 'products'));
    }
}
