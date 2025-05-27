<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditAchievementMediaRequest;
use App\Http\Requests\StoreAchievementMediaRequest;
use App\Models\Achievement;
use App\Models\AchievementMedia;
use App\Traits\SaveFile;
use Illuminate\Http\Request;

class AchievementMediaController extends Controller
{
    use SaveFile;
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
        $achievement_id=$id;
        return view('dashboard.achievements.create_achievement_media',['achievement_id'=>$achievement_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAchievementMediaRequest $request)
    {
        // dd($request);
        if ($request->type == 'image') {

            // dd($request->file('file'));
            foreach ($request->file('file') as $fileimage) {
                $finalImagePathName = $this->SaveImage('images/achievements', $fileimage);
                // $data['path'] = $finalImagePathName; // Save the image path
                $data = [
                    'path'=>$finalImagePathName,
                    'type' =>$request->type,
                    'achievement_id'=>$request->achievement_id
                ];
                // dd($data);
                AchievementMedia::create($data);
            }
        }elseif ($request->type == 'video') {
            $data = [
                'type' =>$request->type,
                'path' => $request->file,
                'achievement_id'=>$request->achievement_id
            ];
            AchievementMedia::create($data);
        }
        return redirect()->route('achievements.edit',$request->achievement_id);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditAchievementMediaRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $achievement_media = AchievementMedia::find($request->achievement_media_id);
        $achievement_id=$achievement_media->achievement->id;

        if ($achievement_media) {
            // Unlink the image if it exists
            if ($achievement_media->path && file_exists(public_path('images/achievements/'.$achievement_media->path))) {
                unlink(public_path('images/achievements/'.$achievement_media->path));
            }
            $achievement_media->delete();
        }
        return redirect()->route('achievements.edit',$achievement_id);
    }
}
