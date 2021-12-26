<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Advantage;
use App\Models\Product;
use App\Models\Scheme;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        $advantages = Advantage::all();
        $schemes = Scheme::all();
        return view('home', compact('advantages', 'schemes', 'reviews'));
    }
}
