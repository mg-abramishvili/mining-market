<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function policy()
    {
        $policy = Policy::find(1);
        return view('policy', compact('policy'));
    }
}
