<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Http\Controllers\Controller;
use App\Mail\LeadMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $lead->message = $request->message;
        $lead->product = $request->product;
        $lead->quiz = $request->quiz;

        $lead->save();

        $lead = Lead::find($lead->id);
        Mail::to('mining.ferma102@gmail.com')->send(new LeadMail($lead));
    }
}
