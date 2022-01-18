<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'tel' => 'required',
        ]);

        $lead = new Lead();
        $lead->name = $request->name;
        $lead->tel = $request->tel;
        $lead->text = $request->text;

        $lead->save();
    }
}
