<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Traits\SaveFile;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;

class SliderController extends Controller
{
    use SaveFile;

    public function index()
    {
        $sliders = Slider::all();
        return view('dashboard.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('dashboard.sliders.create');
    }

    public function store(StoreSliderRequest $request)
    {

        // Step 2: Save the slider main fields (e.g., status)
        $data = $request->except(['_token', 'ar', 'en', 'fr']); // Exclude translations
        if ($request->hasFile('image')) {
            $finalImagePathName = $this->SaveImage('images/sliders', $request->file('image'));
            $data['image'] = $finalImagePathName; // Save the image path
        }
        // Create the slider entry
        $slider = Slider::create($data);
        // Step 3: Handle translations for each locale
        $locales = array_keys(config('app.languages')); // Get list of locales
        foreach ($locales as $locale) {
            if ($request->has($locale)) {
                // Add translations for each locale
                $slider->translateOrNew($locale)->title = $request->input("$locale.title");
            }
        }
        // Save the translations
        $slider->save();
        return redirect()->route('sliders.index')->with('success', 'تم إضافة العرض  بنجاح');
    }

    public function show(Slider $slider)
    {
        //
    }

    public function edit( $id)
    {
        $slider = Slider::find($id);
        return view('dashboard.sliders.edit', compact('slider'));
    }

    public function update(UpdateSliderRequest $request, $id)
    {

        // Find the slider entry
        $slider = Slider::find($id);

        if (!$slider) {
            return redirect()->route('sliders.index')->with('error', 'Slider not found.');
        }

        // Step 2: Prepare data for updating
        $data = $request->except(['_token', 'ar', 'en', 'fr']); // Exclude translations

        // Handle image upload and unlink old image
        if ($request->hasFile('image')) {
            // Unlink the old image if it exists
            if ($slider->image && file_exists(public_path('images/sliders/'.$slider->image))) {
                unlink(public_path('images/sliders/'.$slider->image));
            }
            // Save the new image
            $finalImagePathName = $this->SaveImage('images/sliders', $request->file('image'));
            $data['image'] = $finalImagePathName; // Save the image path
        }

        // Update the slider entry
        $slider->update($data);

        // Step 3: Handle translations for each locale
        $locales = array_keys(config('app.languages')); // Get list of locales
        foreach ($locales as $locale) {
            if ($request->has($locale)) {
                // Update translations for each locale
                $slider->translateOrNew($locale)->title = $request->input("$locale.title");
            }
        }

        // Save the translations
        $slider->save();

        return redirect()->route('sliders.index')->with('edit', 'تم تحديث العرض بنجاح');
    }

    public function destroy(Request $request)
{
    // Find the slider entry by ID
    $slider = Slider::find($request->slider_id);

    // Check if the slider exists
    if (!$slider) {
        return redirect()->route('sliders.index')->with('error', 'Slider not found.');
    }

    // Unlink the image if it exists
    if ($slider->image && file_exists(public_path('images/sliders/'.$slider->image))) {
        unlink(public_path('images/sliders/'.$slider->image));
    }
    // Delete the slider entry
    $slider->delete();
    return redirect()->route('sliders.index')->with('delete', 'تم حذف العرض بنجاح');
}

}
