<?php

namespace App\Http\Controllers\Admin;

use App\Models\Scheme;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSchemeController extends Controller
{
    public function index()
    {
        $schemes = Scheme::all();
        return view('admin.schemes.index', compact('schemes'));
    }

    public function edit($id)
    {
        $scheme = Scheme::where('id', $id)->first();
        return view('admin.schemes.edit', compact('scheme'));
    }

    public function scheme($id)
    {
        return Scheme::where('id', $id)->first();
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'text' => 'required',
        ]);

        $scheme = Scheme::find($id);

        $scheme->name = $request->name;
        $scheme->text = $request->text;

        $scheme->save();
    }
}
