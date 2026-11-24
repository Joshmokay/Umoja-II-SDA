<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Fallback placeholder routes for AYAdvent migrated partial components
Route::get('/search', function() { return redirect('/'); })->name('search');
Route::get('/ministries/{slug}', function() { return redirect('/'); })->name('ministry.show');

use App\Http\Controllers\ChildrensMinistryController;
Route::get('/childrens-ministry', [ChildrensMinistryController::class, 'index'])->name('childrens-ministry.index');

use App\Http\Controllers\AboutController;
Route::get('/about/fundamental-beliefs', [AboutController::class, 'beliefs'])->name('about.beliefs');

use App\Http\Controllers\SabbathSchoolController;
Route::get('/sabbath-school', [SabbathSchoolController::class, 'index'])->name('sabbath-school.index');
Route::get('/sabbath-school/asset/{lang}/{quarter}/{file}', [SabbathSchoolController::class, 'asset'])->name('sabbath-school.asset');
Route::get('/sabbath-school/{lang}', [SabbathSchoolController::class, 'languageIndex'])->name('sabbath-school.lang');
Route::get('/sabbath-school/{lang}/{quarter}', [SabbathSchoolController::class, 'quarter'])->name('sabbath-school.quarter');
Route::get('/sabbath-school/read/{lang}/{quarter}/{id}', [SabbathSchoolController::class, 'read'])->name('sabbath-school.read');
Route::get('/sabbath-school/{lang}/{quarter}/{week}/{day}', [SabbathSchoolController::class, 'lesson'])->name('sabbath-school.lesson');
use App\Http\Controllers\Admin\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('dashboard');

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\PrayerRequestController;
use App\Http\Controllers\Admin\PrayerRequestController as AdminPrayerRequestController;

Route::get('/articles/{category_slug}', [ArticleController::class, 'category'])->name('articles.category');
Route::get('/articles/{category_slug}/{article_slug}', [ArticleController::class, 'show'])->name('articles.show');

// Special Alias for Health & Lifestyle to fulfill exact URL requirement
Route::get('/health-lifestyle', function() {
    return app(\App\Http\Controllers\ArticleController::class)->category('health-lifestyle');
})->name('health-lifestyle.index');
Route::get('/health-lifestyle/{article_slug}', function($article_slug) {
    return app(\App\Http\Controllers\ArticleController::class)->show('health-lifestyle', $article_slug);
})->name('health-lifestyle.show');

// Public prayer requests
Route::post('/prayer-requests', [PrayerRequestController::class, 'store'])->name('prayer.store')->middleware('throttle:3,60');

use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\LeaderController as AdminLeaderController;
use App\Http\Controllers\Admin\LeadershipSettingController as AdminLeadershipSettingController;
use App\Http\Controllers\Admin\StudyGuideController as AdminStudyGuideController;
use App\Http\Controllers\Admin\StudyGuideLessonController as AdminStudyGuideLessonController;
use App\Http\Controllers\Admin\BibleStoryController as AdminBibleStoryController;

Route::get('/events', [EventController::class, 'index'])->name('events.index');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('admin/articles', AdminArticleController::class)->except(['show'])->names([
        'index' => 'admin.articles.index',
        'create' => 'admin.articles.create',
        'store' => 'admin.articles.store',
        'edit' => 'admin.articles.edit',
        'update' => 'admin.articles.update',
        'destroy' => 'admin.articles.destroy',
    ]);

    Route::resource('admin/events', AdminEventController::class)->except(['show'])->names([
        'index' => 'admin.events.index',
        'create' => 'admin.events.create',
        'store' => 'admin.events.store',
        'edit' => 'admin.events.edit',
        'update' => 'admin.events.update',
        'destroy' => 'admin.events.destroy',
    ]);

    Route::resource('admin/prayer-requests', AdminPrayerRequestController::class)->only(['index', 'show', 'update'])->names([
        'index' => 'admin.prayer-requests.index',
        'show' => 'admin.prayer-requests.show',
        'update' => 'admin.prayer-requests.update',
    ]);

    Route::resource('admin/leaders', AdminLeaderController::class)->except(['show'])->names([
        'index' => 'admin.leaders.index',
        'create' => 'admin.leaders.create',
        'store' => 'admin.leaders.store',
        'edit' => 'admin.leaders.edit',
        'update' => 'admin.leaders.update',
        'destroy' => 'admin.leaders.destroy',
    ]);

    Route::post('admin/leadership-settings', [AdminLeadershipSettingController::class, 'update'])->name('admin.leadership-settings.update');

    Route::resource('admin/study-guides', AdminStudyGuideController::class)->except(['show'])->names([
        'index' => 'admin.study-guides.index',
        'create' => 'admin.study-guides.create',
        'store' => 'admin.study-guides.store',
        'edit' => 'admin.study-guides.edit',
        'update' => 'admin.study-guides.update',
        'destroy' => 'admin.study-guides.destroy',
    ]);

    Route::resource('admin/bible-stories', AdminBibleStoryController::class)->except(['show'])->names([
        'index' => 'admin.bible-stories.index',
        'create' => 'admin.bible-stories.create',
        'store' => 'admin.bible-stories.store',
        'edit' => 'admin.bible-stories.edit',
        'update' => 'admin.bible-stories.update',
        'destroy' => 'admin.bible-stories.destroy',
    ]);
    
    Route::resource('admin/church-programs', App\Http\Controllers\Admin\ChurchProgramController::class)->except(['show'])->names([
        'index' => 'admin.church-programs.index',
        'create' => 'admin.church-programs.create',
        'store' => 'admin.church-programs.store',
        'edit' => 'admin.church-programs.edit',
        'update' => 'admin.church-programs.update',
        'destroy' => 'admin.church-programs.destroy',
    ]);
});

use App\Http\Controllers\StudyGuideController;
Route::get('/study-guides', [StudyGuideController::class, 'index'])->name('study-guides.index');
Route::get('/study-guides/{slug}', [StudyGuideController::class, 'show'])->name('study-guides.show');

use App\Http\Controllers\BibleStoryController;
Route::get('/childrens-ministry/stories/{slug}', [BibleStoryController::class, 'show'])->name('childrens-ministry.stories.show');
Route::get('/childrens-ministry/stories/{slug}/download', [BibleStoryController::class, 'downloadPdf'])->name('childrens-ministry.stories.download');

use App\Http\Controllers\ChurchProgramController;
Route::get('/service-times', [ChurchProgramController::class, 'index'])->name('programs.index');

require __DIR__.'/auth.php';
