<?php

use App\Models\Project;
use App\Mail\UserMessage;
use App\Models\Achievement;
use App\Models\AchievementLink;
use Illuminate\Contracts\View\View;

use Illuminate\Support\Facades\App;
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

// use App\Http\Middleware\TrackVisitor;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>'/admin/'], function () {
    Auth::routes();
});
Route::get('admin2/{page}', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/page_500', [AdminController::class, 'page_500']);
Route::get('/send_mail',function()
{
    Mail::to('salimeslam55@gmail.com')->send(new UserMessage('hello atico'));
});
// ,'middleware' => ['auth','admin']
Route::group(['prefix'=>'/admin/','middleware' => ['auth','admin']], function () {
    Route::get('/', [AdminController::class, 'dashboard']);
    Route::get('/index', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('achievements', AchievementController::class);
    Route::resource('achievement_links', AchievementLinkController::class);
    Route::resource('achievement_media', AchievementMediaController::class);

    Route::get('/achievement_links/create/{id}', [AchievementLinkController::class, 'create'])->name('achievement.links.create');
    Route::get('/achievement_media/create/{id}', [AchievementMediaController::class, 'create'])->name('achievement.media.create');






    // Route::post('/product_save_photos',  [ProductController::class, 'saveAttachmentPhotos'])->name('products.photo.store');

    // Route::resource('services', ServiceController::class);

});

Route::group(
    [

        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/',  [HomeController::class, 'index'])->name('home');
        // Route::get('/about',  [HomeController::class, 'about'])->name('about');
        Route::get('/services',  [HomeController::class, 'services'])->name('services');

    }
);

