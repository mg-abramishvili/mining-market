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
        $reviews = Review::all();
        $advantages = Advantage::all();
        $schemes = Scheme::all();
        $about = About::find(1);
        return view('home', compact('hero', 'advantages', 'schemes', 'reviews', 'about'));
    }
}
