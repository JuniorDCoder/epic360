<?php

namespace App\Http\Controllers\Admin;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'currency' => 'required|string|max:10',
            'email_notifications' => 'required|boolean',
        ]);

        $store = Store::first();
        $store->update([
            'name' => $request->name,
            'location' => $request->location,
            'currency' => $request->currency,
            'email_notifications' => $request->email_notifications,
        ]);

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
