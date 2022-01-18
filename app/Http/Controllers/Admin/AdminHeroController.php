<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hero;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHeroController extends Controller
{
    public function edit()
    {
        $hero = Hero::find(1);
        return view('admin.hero.edit', compact('hero'));
    }

    public function edit_data()
    {
        return Hero::find(1);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $hero = Hero::find(1);

        $hero->title = $request->title;
        $hero->list_item_1 = $request->list_item_1;
        $hero->list_item_2 = $request->list_item_2;
        $hero->list_item_3 = $request->list_item_3;

        $hero->save();
    }
}
