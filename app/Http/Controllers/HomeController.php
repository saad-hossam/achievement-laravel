<?php
namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Models\AchievementMedia;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
         $departments = Department::active()->with('translations')->get(); // Departments with translations
         $achievements = Achievement::with('translations')->get(); // Departments with translations

        return view('Front.home', [
            'departments' => $departments,
            'achievements'=> $achievements

        ]);
    }
    public function about()
    {
        return view('Front.about');
    }
    public function show($id)
{
    $achievement = Achievement::with('media', 'links', 'translations', 'department.translations')->findOrFail($id);
    return view('Front.details', ['achievement' => $achievement]);
}

public function filter(Request $request)
{
    $locale = app()->getLocale();

    $query = Achievement::with(['department', 'translations'])
        ->when($request->category, fn($q) =>
            $q->where('department_id', (int) $request->category)
        )
        ->when($request->search, fn($q) =>
            $q->whereHas('translations', fn($qt) =>
                $qt->where('locale', $locale)
                   ->where('title', 'like', '%' . $request->search . '%')
            )
        )
        ->when($request->start_date, fn($q) =>
            $q->whereDate('achievement_date', '>=', $request->start_date)
        )
        ->when($request->end_date, fn($q) =>
            $q->whereDate('achievement_date', '<=', $request->end_date)
        );

    // Sorting
    switch ($request->sort) {
        case 'date-asc':
            $query->orderBy('achievement_date', 'asc');
            break;
        case 'date-desc':
            $query->orderBy('achievement_date', 'desc');
            break;
        case 'title-asc':
        case 'title-desc':
            $query->whereHas('translations', fn($qt) =>
                $qt->where('locale', $locale)
            )
            ->with(['translations' => fn($qt) =>
                $qt->where('locale', $locale)
            ])
            ->get()
            ->sortBy(function ($item) use ($locale) {
                return $item->translate($locale)?->title;
            }, SORT_REGULAR, $request->sort === 'title-desc');
            break;
    }

    // If we sorted by title, we already called `get()`, else we need to do it now
    if (!isset($achievements)) {
        $achievements = $query->get();
    }

    $articles = $achievements->map(function ($achievement) use ($locale) {
        return [
            'id' => $achievement->id,
            'title' => $achievement->translate($locale)?->title ?? '',
            'desc' => $achievement->translate($locale)?->desc ?? '',
            'date' => $achievement->achievement_date?->format('Y-m-d') ?? '',
            'image_layout' => $achievement->image_layout,
        ];
    });

    return response()->json([
        'articles' => $articles,
        'count' => $articles->count(),
    ]);
}


  public function videos()
{
    $videos = AchievementMedia::where('type', 'video')->get();

    return view('Front.video', compact('videos'));
}







}

