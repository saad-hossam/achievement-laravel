<?php

namespace App\Http\Controllers;

use App\Traits\SaveFile;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

class DepartmentController extends Controller
{
use SaveFile;
    // function __construct()
    // {
    //      $this->middleware('permission:department-list|department-create|department-edit|department-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:department-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:department-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:department-delete', ['only' => ['destroy']]);
    // }


    public function index()
    {
       $departments=Department::all();
       return view('dashboard.departments.index',['departments'=>$departments]);
    }


    public function create()
    {
        return view('dashboard.departments.create');
    }

    public function store(StoreDepartmentRequest $request)
    {
             // Step 1: Save the department main fields (e.g., status)
          $data = $request->except(['_token', 'ar', 'en', 'fr']); // Exclude translations
          if ($request->hasFile('image')) {
            $finalImagePathName = $this->SaveImage('images/departments', $request->file('image'));
            $data['image'] = $finalImagePathName; // Save the image path
          }
          $department = Department::create($data);  // This will save 'status' and other fields
          // Step 2: Handle translations for each locale (ar, en, fr)
          $locales = array_keys(config('app.languages'));  // List of locales to process
          foreach ($locales as $locale) {
              if ($request->has($locale)) {
                  // Create or update the translation for each locale
                  $department->translateOrNew($locale)->name = $request->input("$locale.name");
              }
          }
          // Save the department along with its translations
          $department->save();
          return redirect()->route('departments.index');
    }

    public function show(Department $department)
    {
        return view('dashboard.departments.show',['department'=>$department]);
    }

    public function edit(Department $department)
    {
        return view('dashboard.departments.edit',['department'=>$department]);
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
{
    // Step 1: Save the department main fields (e.g., status)
    $data = $request->except(['_token', '_method', 'ar', 'en', 'fr']); // Exclude translations

    if ($request->hasFile('image')) {
        // Unlink the old image if it exists
        if ($department->image && file_exists(public_path('images/departments/' . $department->image))) {
            unlink(public_path('images/departments/' . $department->image));
        }

        // Save the new image
        $finalImagePathName = $this->SaveImage('images/departments', $request->file('image'));
        $data['image'] = $finalImagePathName; // Save the image path
    }

    // Update the department main fields
    $department->update($data);

    // Step 2: Handle translations for each locale (ar, en, fr)
    $locales = array_keys(config('app.languages')); // List of locales to process
    foreach ($locales as $locale) {
        if ($request->has($locale)) {
            // Create or update the translation for each locale
            $department->translateOrNew($locale)->name = $request->input("$locale.name");
        }
    }
    $department->save();
    return redirect()->route('departments.index');
}


    public function destroy(Request $request)
    {
        $department = Department::find($request->department_id);
        if ($department) {
            // Unlink the image if it exists
            if ($department->image && file_exists(public_path('images/departments/'.$department->image))) {
                unlink(public_path('images/departments/'.$department->image));
            }
            $department->translations()->delete();
            $department->delete();
        }
        return redirect()->route('departments.index');
    }
}
