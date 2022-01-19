<?php

namespace App\Http\Controllers\Admin;

use App\Models\Advantage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAdvantageController extends Controller
{
    public function index()
    {
        $advantages = Advantage::all();
        return view('admin.advantages.index', compact('advantages'));
    }

    public function edit($id)
    {
        $advantage = Advantage::where('id', $id)->first();
        return view('admin.advantages.edit', compact('advantage'));
    }

    public function advantage($id)
    {
        return Advantage::where('id', $id)->first();
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
            'icon' => 'required',
        ]);

        $advantage = Advantage::find($id);

        $advantage->text = $request->text;
        $advantage->icon = $request->icon;

        $advantage->save();
    }
}
