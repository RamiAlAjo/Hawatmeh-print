<?php

namespace App\Http\Controllers\Admin;

use App\Models\WebsiteSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminWebsiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = WebsiteSetting::first();

        return view('admin.setting.index')->with(compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'youtube' => 'nullable|url',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'key_words' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'logo' => 'nullable|image',
            'address' => 'nullable|string',
            'url' => 'nullable|url',
            'contact_email' => 'nullable|email',
            'carrers_email' => 'nullable|email',
            'location' => 'nullable', // Validate Google Maps link as a URL
        ]);

        // Fetch the existing settings or create a new one
        $setting = WebsiteSetting::firstOrNew([]);

        // Handle logo removal if checked
        if ($request->has('remove_logo') && $request->input('remove_logo') == 1 && !empty($setting->logo)) {
            if (file_exists(public_path($setting->logo))) {
                unlink(public_path($setting->logo));  // Remove the old logo
            }
            $setting->logo = null;  // Remove logo from database
        }

        // Handle file upload for logo
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $logoFilename = time() . '.' . $ext;
            $logoUploadPath = 'uploads/site/logos/';
            $file->move(public_path($logoUploadPath), $logoFilename);
            $setting->logo = $logoUploadPath . $logoFilename;  // Save the logo path
        }

        // Save the other settings
        $setting->facebook = $request->facebook;
        $setting->instagram = $request->instagram;
        $setting->twitter = $request->twitter;
        $setting->youtube = $request->youtube;
        $setting->title = $request->title;
        $setting->description = $request->description;
        $setting->key_words = $request->key_words;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->address = $request->address;
        $setting->url = $request->url;
        $setting->contact_email = $request->contact_email;
        $setting->carrers_email = $request->carrers_email;
        $setting->location = $request->location;  // Save the Google Maps URL

        $setting->save();

        return redirect()->route('admin.setting.index')->with('status-success', 'Settings have been updated successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // If required, you can implement logic here to update settings like logo
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
