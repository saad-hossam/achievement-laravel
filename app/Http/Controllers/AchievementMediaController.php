<?php

namespace App\Http\Controllers;

use App\Traits\SaveFile;
use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Models\AchievementMedia;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EditAchievementMediaRequest;
use App\Http\Requests\StoreAchievementMediaRequest;

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
    if ($request->type == 'image') {

        foreach ($request->file('file') as $fileimage) {
            $finalImagePathName = $this->SaveImage('images/achievements', $fileimage);

            AchievementMedia::create([
                'path' => $finalImagePathName,
                'type' => $request->type,
                'achievement_id' => $request->achievement_id
            ]);
        }

    } elseif ($request->type == 'video') {
    $videoUrl = $request->input('file');

    preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $videoUrl, $matches);
    $videoId = $matches[1] ?? null;

    if (!$videoId) {
        parse_str(parse_url($videoUrl, PHP_URL_QUERY), $queryParams);
        $videoId = $queryParams['v'] ?? null;
    }

    if (!$videoId) {
        return back()->withErrors(['file' => 'Invalid YouTube URL']);
    }

    // === Ensure directory exists and save thumbnail ===
    $folder = public_path('videos/thumbnails/');
    $thumbnailName = "thumbnail_{$videoId}.jpg";
    $thumbnailPath = $folder . $thumbnailName;

    if (!file_exists($folder)) {
        mkdir($folder, 0755, true);
    }

    $thumbnailUrl = "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
    $thumbnailContents = file_get_contents($thumbnailUrl);
    file_put_contents($thumbnailPath, $thumbnailContents);

    AchievementMedia::create([
        'type' => $request->type,
        'path' => $videoUrl,
        'video_id' => $videoId,
        'achievement_id' => $request->achievement_id
    ]);
}


    return redirect()->route('achievements.edit', $request->achievement_id);
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
   public function update(EditAchievementMediaRequest $request, $achievement_id)
{
    $achievement = Achievement::findOrFail($achievement_id);

    if ($request->type === 'image') {

        // Optionally, delete existing images if you're replacing them
        // AchievementMedia::where('achievement_id', $achievement_id)->where('type', 'image')->delete();

        foreach ($request->file('file') as $fileImage) {
            $finalImagePathName = $this->SaveImage('images/achievements', $fileImage);

            AchievementMedia::create([
                'path' => $finalImagePathName,
                'type' => 'image',
                'achievement_id' => $achievement_id,
            ]);
        }

    }elseif ($request->type === 'video') {
    $videoUrl = $request->input('file');

    // Extract YouTube video ID
    preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $videoUrl, $matches);
    $videoId = $matches[1] ?? null;

    if (!$videoId) {
        parse_str(parse_url($videoUrl, PHP_URL_QUERY), $queryParams);
        $videoId = $queryParams['v'] ?? null;
    }

    if (!$videoId) {
        return back()->withErrors(['file' => 'Invalid YouTube URL']);
    }

    // Download YouTube thumbnail
    $thumbnailUrl = "https://img.youtube.com/vi/$videoId/hqdefault.jpg";
    $thumbnailContents = @file_get_contents($thumbnailUrl);

    if (!$thumbnailContents) {
        return back()->withErrors(['file' => 'Failed to fetch thumbnail']);
    }

    // Save thumbnail to public/videos/thumbnails/
    $thumbnailName = 'thumbnail_' . uniqid() . '.jpg';
    $savePath = public_path('videos/thumbnails/' . $thumbnailName);

    // Ensure the directory exists
    if (!file_exists(public_path('videos/thumbnails'))) {
        mkdir(public_path('videos/thumbnails'), 0755, true);
    }

    file_put_contents($savePath, $thumbnailContents);

    // Save data (without thumbnail column — just reusing "path" field or ignoring thumbnail if DB doesn't need it)
    AchievementMedia::create([
        'path' => $videoUrl,
        'type' => 'video',
        'video_id' => $videoId,
        // You can use 'thumbnail' if your DB supports it, or remove this line
        'achievement_id' => $achievement_id,
    ]);
}



    return redirect()->route('achievements.edit', $achievement_id)->with('success', 'Media updated successfully.');
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
