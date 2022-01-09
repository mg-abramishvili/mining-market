<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index()
    {
        $settings = Setting::find(1);
        return view('admin.settings.index', compact('settings'));
    }

    public function index_data()
    {
        return Setting::find(1);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'tel' => 'required',
            'email_for_notifications' => 'nullable|email:rfc,dns',
        ]);

        $settings = Setting::find(1);

        $settings->tel = $request->tel;
        $settings->email_for_notifications = $request->email_for_notifications;
        $settings->address = $request->address;

        $settings->save();
    }
}
