<?php

namespace App\Http\Controllers;

use App\Traits\SaveFile;
use App\Models\Department;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AchievementController extends Controller
{
    use SaveFile;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achievements = Achievement::with('department')->get();
        // dd($achievements[0]->department->name);
        return view('dashboard.achievements.index', ['achievements' => $achievements]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::active()->get();
        return view('dashboard.achievements.create', ['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // Step 1: Save the department main fields (e.g., status)
        $data = $request->except(['_token', 'ar', 'en']); // Exclude translations
        $achievementDate = $request->achievement_date
    ? Carbon::createFromFormat('Y/m/d', $request->achievement_date)->format('Y-m-d')
    : null;
    $data['achievement_date']=$achievementDate;
        if ($request->hasFile('image_layout')) {
            $finalImagePathName = $this->SaveImage('images/achievements', $request->file('image_layout'));
            $data['image_layout'] = $finalImagePathName; // Save the image path
        }
        $data['created_by'] = Auth::id();
        $achievement = Achievement::create($data);  // This will save 'status' and other fields
        // Step 2: Handle translations for each locale (ar, en, fr)
        $locales = array_keys(config('app.languages'));  // List of locales to process
        foreach ($locales as $locale) {
            if ($request->has($locale)) {
                // Create or update the translation for each locale
                $achievement->translateOrNew($locale)->title = $request->input("$locale.title");
                $achievement->translateOrNew($locale)->desc = $request->input("$locale.desc");
            }
        }
        // Save the department along with its translations
        $achievement->save();
        return redirect()->route('achievements.edit', $achievement->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Achievement $achievement)
    {
        $links=$achievement->links()->get();
        $media=$achievement->media()->orderBy('type')->get();
        // dd($media);

        $departments = Department::active()->get();
        return view('dashboard.achievements.edit', [
                                                    'achievement' => $achievement,
                                                     'links'=>$links,
                                                     'departments' => $departments,
                                                     'media'=>$media
                                                    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Achievement $achievement)
    {
        $data = $request->except(['_token', '_method', 'ar', 'en', 'fr']); // Exclude translations
        $achievementDate = $request->achievement_date
        ? Carbon::createFromFormat('Y/m/d', $request->achievement_date)->format('Y-m-d')
        : null;
        $data['achievement_date']=$achievementDate;
        if ($request->hasFile('image_layout')) {
            if ($achievement->image_layout && file_exists(public_path('images/achievements/' . $achievement->image_layout))) {
                unlink(public_path('images/achievements/' . $achievement->image_layout));
            }
            $finalImagePathName = $this->SaveImage('images/achievements', $request->file('image_layout'));
            $data['image_layout'] = $finalImagePathName; // Save the image path
        }
        $achievement->update($data);
        $locales = array_keys(config('app.languages')); // List of locales to process
        foreach ($locales as $locale) {
            if ($request->has($locale)) {
                $achievement->translateOrNew($locale)->title = $request->input("$locale.title");
                $achievement->translateOrNew($locale)->desc = $request->input("$locale.desc");
            }
        }
        $achievement->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $achievement = Achievement::find($request->achievement_id);
        if ($achievement) {
            // Unlink the image if it exists
            if ($achievement->image && file_exists(public_path('images/achievements/'.$achievement->image))) {
                unlink(public_path('images/achievements/'.$achievement->image));
            }
            $achievement->translations()->delete();
            $achievement->delete();
        }
        return redirect()->route('achievements.index');
    }
}
