<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Traits\SaveFile;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHistoryRequest;
use App\Http\Requests\UpdateHistoryRequest;

class historyController extends Controller
{
    use SaveFile;

    function __construct()
    {
         $this->middleware('permission:history-list|history-create|history-edit|history-delete', ['only' => ['index','store']]);
         $this->middleware('permission:history-create', ['only' => ['create','store']]);
         $this->middleware('permission:history-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:history-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $histories=History::all();
        return view('dashboard.histories.index',['histories'=>$histories]);
    }

    public function create()
    {
        return view('dashboard.histories.create');
    }

    public function store(StoreHistoryRequest $request)
    {
             // Step 1: Save the histories main fields (e.g., status)
            $data = $request->except(['_token', 'ar', 'en', 'fr']); // Exclude translations
            if ($request->hasFile('image')) {
                $finalImagePathName = $this->SaveImage('images/histories', $request->file('image'));
                $data['image'] = $finalImagePathName; // Save the image path
            }

        // Create the slider entry
        $histories = History::create($data);
          // Step 2: Handle translations for each locale (ar, en, fr)
          $locales = array_keys(config('app.languages'));  // List of locales to process
          foreach ($locales as $locale) {
             if ($request->has($locale)) {
                 // Create or update the translation for each locale
                 $histories->translateOrNew($locale)->name = $request->input("$locale.name");
                 // Add other translatable fields, like description, if needed
                 $histories->translateOrNew($locale)->description = $request->input("$locale.description");
             }
          }
          // Save the histories along with its translations
          $histories->save();
          return redirect()->route('histories.index');
    }

    public function show(History $histories)
    {
        //
    }

    public function edit( $id)
    {
        $history=History::find($id);
        return view('dashboard.histories.edit',['history' => $history]);
    }

    public function update(UpdateHistoryRequest $request, $id)
    {

    // Find the record and check for existence
    $history = History::find($id);
    if (!$history) {
        return redirect()->route('histories.index')->withErrors(['error' => 'History record not found.']);
    }
    // Unlink the old image if a new image is being uploaded and the old image exists
    if ($request->hasFile('image') && $history->image && file_exists(public_path('images/histories/'.$history->image))) {
        unlink(public_path('images/histories/'.$history->image)); // Delete the old image
    }
    // Update image if provided
    if ($request->hasFile('image')) {
        $finalImagePathName = $this->SaveImage('images/histories', $request->file('image'));
        $history->image = $finalImagePathName; // Save the new image path
    }
    // Save the base model
    $history->save();
    // Update translations dynamically for all locales
    $locales = array_keys(config('app.languages')); // Get defined locales
    foreach ($locales as $locale) {
        if ($request->has($locale)) {
            $history->translateOrNew($locale)->name = $request->input("$locale.name");
            $history->translateOrNew($locale)->description = $request->input("$locale.description");
        }
    }
    // Save translations
    $history->save();
    return redirect()->route('histories.index')->with('success', 'History updated successfully.');
}

public function destroy(Request $request)
{

    $history = History::find($request->history_id);
    if (!$history) {
        return redirect()->route('histories.index')->with('error', 'history not found.');
    }
    // Unlink the associated image if it exists
    if ($history->image && file_exists(public_path('images/histories/' . $history->image))) {
        unlink(public_path('images/histories/' . $history->image));
    }
    // Delete translations and the history record
    $history->translations()->delete();
    $history->delete();
    return redirect()->route('histories.index')->with('success', 'history deleted successfully.');

}

}
