<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditAchievementLinkRequest;
use App\Http\Requests\StoreAchievementLinkRequest;
use App\Models\AchievementLink;
use Illuminate\Http\Request;

class AchievementLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // dd($id);
        $achievement_id=$id;
        return view('dashboard.achievements.create_achievement_links',['achievement_id'=>$achievement_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreAchievementLinkRequest $request)
    {
        $locales = array_keys(config('app.languages'));

        foreach ($request->url as $key => $url) {
            $achievement = new AchievementLink();
            $achievement->url = $url;
            $achievement->achievement_id = $request->achievement_id;

            // Assign translations for each locale
            foreach ($locales as $locale) {
                $title = $request->input("$locale.title.$key"); // Corrected array access
                if ($title) {
                    $achievement->translateOrNew($locale)->title = $title;
                }
            }

            $achievement->save(); // Save after assigning translations
        }

        return redirect()->route('achievements.index')->with('success', 'تمت إضافة الروابط بنجاح.');
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
    public function edit( AchievementLink $achievement_link)
    {
        // dd($achievement_link->achievement->id);
        return view('dashboard.achievements.edit_achievement_link',['achievement_link'=>$achievement_link]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditAchievementLinkRequest $request,AchievementLink $achievement_link)
    {
        $data = $request->except(['_token', '_method', 'ar', 'en']);
        $achievement_link->update($data);
        $locales = array_keys(config('app.languages')); // List of locales to process
        foreach ($locales as $locale) {
            if ($request->has($locale)) {
                $achievement_link->translateOrNew($locale)->title = $request->input("$locale.title");
            }
        }
        $achievement_link->save();
        return redirect()->route('achievements.edit',$achievement_link->achievement->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $achievement_link = AchievementLink::find($request->achievement_link_id);
        $achievement_id=$achievement_link->achievement->id;
        if ($achievement_link) {
            $achievement_link->delete();
        }
        return redirect()->route('achievements.edit',$achievement_id);
    }
}
