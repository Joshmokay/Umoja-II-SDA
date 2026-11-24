<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;

class LeadershipSettingController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'leadership_title' => 'nullable|string|max:255',
            'leadership_text' => 'nullable|string',
            'leadership_bg_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->has('leadership_title')) {
            SiteSetting::updateOrCreate(['key' => 'leadership_title'], ['value' => $request->leadership_title]);
        }

        if ($request->has('leadership_text')) {
            SiteSetting::updateOrCreate(['key' => 'leadership_text'], ['value' => $request->leadership_text]);
        }

        if ($request->hasFile('leadership_bg_image')) {
            $oldImage = SiteSetting::getSetting('leadership_bg_image');
            if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
            $path = $request->file('leadership_bg_image')->store('leadership/settings', 'public');
            SiteSetting::updateOrCreate(['key' => 'leadership_bg_image'], ['value' => $path]);
        }

        return redirect()->route('admin.leaders.index')->with('success', 'Leadership section settings updated successfully.');
    }
}
