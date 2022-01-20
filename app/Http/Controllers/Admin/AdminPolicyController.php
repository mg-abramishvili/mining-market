<?php

namespace App\Http\Controllers\Admin;

use App\Models\Policy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPolicyController extends Controller
{
    public function policy()
    {
        $policy = Policy::find(1);
        return view('admin.policy.edit', compact('policy'));
    }

    public function policy_data()
    {
        return Policy::find(1);
    }

    public function update(Request $request)
    {
        $policy = Policy::find(1);

        $policy->text = $request->text;

        $policy->save();
    }
}