<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class SettingsController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('client_management_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // We assume there's always one row for global settings. So we get the first one, or create an empty instance.
        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('client_management_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $validated = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'company_email' => 'nullable|email|max:255',
            'company_phone' => 'nullable|string|max:255',
            'company_address_line1' => 'nullable|string|max:255',
            'company_address_line2' => 'nullable|string|max:255',
        ]);

        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }

        $setting->fill($validated);
        $setting->save();

        return redirect()->route('admin.settings.edit')->with('message', 'Settings updated successfully.');
    }
}
