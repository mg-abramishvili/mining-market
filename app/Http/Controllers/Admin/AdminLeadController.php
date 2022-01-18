<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lead;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLeadController extends Controller
{
    public function index()
    {
        $leads = Lead::all();
        return view('admin.leads.index', compact('leads'));
    }

    public function show($id)
    {
        $lead = Lead::where('id', $id)->first();
        return view('admin.leads.show', compact('lead'));
    }
}
