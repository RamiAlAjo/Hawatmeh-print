<?php

namespace App\Http\Controllers\admin;

use App\Models\HomepageSlider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomepageSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = HomepageSlider::all();
        return view('admin.homepage.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.homepage.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_en' => 'nullable',
            'title_ar' => 'nullable',
            'description_en' => 'nullable',
            'description_ar' => 'nullable',
            'url' => 'nullable',
            'image' => 'required',
        ]);

        $slider = new HomepageSlider();

        $slider->title_en = $request->title_en;
        $slider->title_ar = $request->title_ar;
        $slider->description_en = $request->description_en;
        $slider->description_ar = $request->description_ar;
        $slider->url = $request->url;

        if ($request->hasFile('image')) {
            $slidersImageUploadPath = 'uploads/sliders/image/';
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $slidersImageFilename = time() . '.' . $ext;
            $file->move($slidersImageUploadPath, $slidersImageFilename);
            $slider->image = $slidersImageUploadPath . $slidersImageFilename;
        }

        if ($slider->save()) {
            return to_route('admin.slider.index')->with('success-status', 'Slider Created Successfully.');
        }
        return to_route('sliders.index')->with('failed-status', 'Something Went Wrong!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $slider = HomepageSlider::findOrFail($id);
        return view('admin.homepage.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'title_en' => 'nullable',
            'title_ar' => 'nullable',
            'description_en' => 'nullable',
            'description_ar' => 'nullable',
            'url' => 'nullable',
            'image' => 'nullable',
        ]);

        $slider = HomepageSlider::findOrFail($id);

        $slider->title_en = $request->title_en;
        $slider->title_ar = $request->title_ar;
        $slider->description_en = $request->description_en;
        $slider->description_ar = $request->description_ar;
        $slider->url = $request->url;

        if ($request->hasFile('image')) {
            $slidersImageUploadPath = 'uploads/sliders/image/';
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $slidersImageFilename = time() . '.' . $ext;
            $file->move($slidersImageUploadPath, $slidersImageFilename);
            $slider->image = $slidersImageUploadPath . $slidersImageFilename;
        }

        if ($slider->save()) {
            return to_route('admin.slider.index')->with('success-status', 'Slider Updated Successfully.');
        }
        return to_route('sliders.index')->with('failed-status', 'Something Went Wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = HomepageSlider::findOrFail($id);

        if ($slider->delete()) {
            return redirect()->back()->with('status-success', 'Slider Deleted Successfully');
        }
        return redirect()->back()->with('status-error', 'Slider Delete Failed');
    }
}
