<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Traits\SaveFile;
use Illuminate\Http\Request;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    use SaveFile;

    function __construct()
    {
         $this->middleware('permission:service-list|service-create|service-edit|service-delete', ['only' => ['index','store']]);
         $this->middleware('permission:service-create', ['only' => ['create','store']]);
         $this->middleware('permission:service-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:service-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $services=Service::all();
        return view('dashboard.services.index',['services'=>$services]);
    }

    public function create()
    {
        return view('dashboard.services.create');
    }
    public function store(StoreServiceRequest $request)
    {
        // Step 1: Validate the request
        $request->validate([
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'ar.name' => 'required|string',
            'ar.description' => 'nullable|string',
            'ar.body' => 'nullable|string',
            'en.name' => 'required|string',
            'en.description' => 'nullable|string',
            'en.body' => 'nullable|string',

        ]);

        // Step 2: Save the main service fields
        $data = $request->except(['_token', 'ar', 'en', 'fr']); // Exclude translation fields

        if ($request->hasFile('image')) {
            $data['image'] = $this->SaveImage('images/services', $request->file('image'));
        }

        $service = Service::create($data); // Save main fields like 'status'

        // Step 3: Handle translations for each locale
        $locales = array_keys(config('app.languages')); // ['ar', 'en', 'fr']
        foreach ($locales as $locale) {
            if ($request->has($locale)) {
                $service->translateOrNew($locale)->name = $request->input("$locale.name");
                $service->translateOrNew($locale)->description = $request->input("$locale.description");
                $service->translateOrNew($locale)->body = $request->input("$locale.body");
            }
        }

        $service->save(); // Save translations and main service data

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }


    public function show(Service $service)
    {
        //
    }

    public function edit(Service $service)
    {
        return view('dashboard.services.edit',['service' => $service]);

    }

    public function update(UpdateServiceRequest $request,  $id)
    {
        // Find the record and check for existence
    $service = service::find($id);
    if (!$service) {
        return redirect()->route('histories.index')->withErrors(['error' => 'service record not found.']);
    }
    // Unlink the old image if a new image is being uploaded and the old image exists
    if ($request->hasFile('image') && $service->image && file_exists(public_path('images/services/'.$service->image))) {
        unlink(public_path('images/services/'.$service->image)); // Delete the old image
    }
    // Update image if provided
    if ($request->hasFile('image')) {
        $finalImagePathName = $this->SaveImage('images/services', $request->file('image'));
        $service->image = $finalImagePathName; // Save the new image path
    }
    // Save the base model
    $service->save();
    // Update translations dynamically for all locales
    $locales = array_keys(config('app.languages')); // Get defined locales
    foreach ($locales as $locale) {
        if ($request->has($locale)) {
            $service->translateOrNew($locale)->name = $request->input("$locale.name");
            $service->translateOrNew($locale)->description = $request->input("$locale.description");
            $service->translateOrNew($locale)->body = $request->input("$locale.body");
        }
    }
    // Save translations
    $service->save();
    return redirect()->route('services.index')->with('success', 'service updated successfully.');
}


    public function destroy(Request $request)
{
    $service = Service::find($request->service_id);
    if (!$service) {
        return redirect()->route('services.index')->with('error', 'Service not found.');
    }
    // Unlink the associated image if it exists
    if ($service->image && file_exists(public_path('images/services/' . $service->image))) {
        unlink(public_path('images/services/' . $service->image));
    }
    // Delete translations and the service record
    $service->translations()->delete();
    $service->delete();
    return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
}

}
