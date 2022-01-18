<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('admin.reviews.create');
    }

    public function edit($id)
    {
        $review = Review::where('id', $id)->first();
        return view('admin.reviews.edit', compact('review'));
    }

    public function review($id)
    {
        return Review::where('id', $id)->first();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required',
            'screenshot' => 'required',
        ]);

        $review = new Review();

        $review->photo = $request->photo;
        $review->screenshot = $request->screenshot;

        $review->save();
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'photo' => 'required',
            'screenshot' => 'required',
        ]);

        $review = Review::find($id);

        $review->photo = $request->photo;
        $review->screenshot = $request->screenshot;

        $review->save();
    }
}
