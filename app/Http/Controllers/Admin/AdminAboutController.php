<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAboutController extends Controller
{
    public function edit()
    {
        $about = About::find(1);
        return view('admin.about.edit', compact('about'));
    }

    public function edit_data()
    {
        return About::find(1);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
        ]);

        $about = About::find(1);

        $about->text = $request->text;

        $about->save();
    }
}
