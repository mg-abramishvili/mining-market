<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('admin.products.edit', compact('product'));
    }

    public function product($id)
    {
        return Product::where('id', $id)->first();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'gpu' => 'required',
            'gpu_amount' => 'required|numeric',
            'dohodnost' => 'required|numeric',
            'gallery' => 'required',
        ]);

        $product = new Product();

        $product->name = $request->name;
        $product->gpu = $request->gpu;
        $product->gpu_amount = $request->gpu_amount;
        $product->dohodnost = $request->dohodnost;
        $product->price = $request->price;

        if (!isset($request->gallery)) {
            $request->gallery = [];
        }
        $product->gallery = $request->gallery;

        $product->save();
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'gpu' => 'required',
            'gpu_amount' => 'required|numeric',
            'dohodnost' => 'required|numeric',
            'gallery' => 'required',
        ]);

        $product = Product::find($id);

        $product->name = $request->name;
        $product->gpu = $request->gpu;
        $product->gpu_amount = $request->gpu_amount;
        $product->dohodnost = $request->dohodnost;
        $product->price = $request->price;

        if (!isset($request->gallery)) {
            $request->gallery = [];
        }
        $product->gallery = $request->gallery;

        $product->save();
    }
}
