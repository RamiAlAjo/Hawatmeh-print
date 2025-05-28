<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AdminAboutSectionController extends Controller
{
    // Display a listing of the about sections.
    public function index()
    {
        $aboutSections = AboutSection::all();
        return view('admin.homepage.about.index', compact('aboutSections'));
    }

    // Show the form for creating a new about section.
    public function create()
    {
        return view('admin.homepage.about.create');
    }

    // Store a newly created about section in the database.
    public function store(Request $request)
    {
        $request->validate([
            'about_section_description_en' => 'nullable|string',
            'about_section_description_ar' => 'nullable|string',
        ]);

        AboutSection::create([
            'about_section_description_en' => $request->about_section_description_en,
            'about_section_description_ar' => $request->about_section_description_ar,
        ]);

        return redirect()->route('admin.about-section.index');
    }

    // Show the form for editing the specified about section.
    public function edit($id)
    {
        $aboutSection = AboutSection::findOrFail($id);
        return view('admin.homepage.about.edit', compact('aboutSection'));
    }

    // Update the specified about section in the database.
    public function update(Request $request, $id)
    {
        $aboutSection = AboutSection::findOrFail($id);

        $request->validate([
            'about_section_description_en' => 'nullable|string',
            'about_section_description_ar' => 'nullable|string',
        ]);

        $aboutSection->update([
            'about_section_description_en' => $request->about_section_description_en,
            'about_section_description_ar' => $request->about_section_description_ar,
        ]);

        return redirect()->route('admin.about-section.index');
    }

    // Remove the specified about section from the database.
    public function destroy($id)
    {
        AboutSection::destroy($id);
        return redirect()->route('admin.about-section.index');
    }
}
