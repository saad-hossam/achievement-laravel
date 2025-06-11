<?php

use App\Mail\UserMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AchievementLinkController;
use App\Http\Controllers\AchievementMediaController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Admin Auth Routes
Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
});

// Admin Pages
Route::get('admin2/{page}', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/page_500', [AdminController::class, 'page_500']);

// Send Test Mail
Route::get('/send_mail', function () {
    Mail::to('salimeslam55@gmail.com')->send(new UserMessage('hello atico'));
});

// Protected Admin Routes
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'admin']
], function () {
    Route::get('/', [AdminController::class, 'dashboard']);
    Route::get('/index', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('achievements', AchievementController::class);
    Route::resource('achievement_links', AchievementLinkController::class);
    Route::resource('achievement_media', AchievementMediaController::class);

    Route::get('achievement_links/create/{id}', [AchievementLinkController::class, 'create'])->name('achievement.links.create');
    Route::get('achievement_media/create/{id}', [AchievementMediaController::class, 'create'])->name('achievement.media.create');
});

// Localized Public Routes
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath',
    ]
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/achievements/{id}', [HomeController::class, 'show'])->name('details');
    Route::get('/videos', [HomeController::class, 'videos'])->name('videos');
    Route::get('/video-library', [HomeController::class, 'index'])->name('video.library');

    Route::post('/articles/filter', action: [HomeController::class, 'filter'])->name('articles.filter');

});
