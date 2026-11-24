<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Leader;
use App\Models\SiteSetting;
use Carbon\Carbon;

use App\Models\ChurchProgram;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch Service Times
        $sabbathPrograms = ChurchProgram::where('is_active', true)
                            ->where('day', 'Saturday')
                            ->with('activities')
                            ->orderBy('order')
                            ->orderBy('start_time')
                            ->get()
                            ->groupBy('category');

        $midweekPrograms = ChurchProgram::where('is_active', true)
                            ->where('category', 'Mid-week')
                            ->with('activities')
                            ->orderBy('day')
                            ->orderBy('start_time')
                            ->get();

        return view('home.index', [
            'heroSlides' => [],
            'upcomingEvents' => Event::where('start_date', '>=', Carbon::today())->orderBy('start_date', 'asc')->take(3)->get(),
            'sermons' => [],
            'announcements' => [],
            'ministries' => [],
            'galleries' => [],
            'leaders' => Leader::where('is_active', true)->orderBy('display_order')->get(),
            'leadership_title' => SiteSetting::getSetting('leadership_title', 'Church Leadership'),
            'leadership_text' => SiteSetting::getSetting('leadership_text', 'Meet the dedicated leaders serving Umoja II Seventh-day Adventist Church.'),
            'leadership_bg_image' => SiteSetting::getSetting('leadership_bg_image'),
            'downloads' => [],
            'dailyVerse' => null,
            'globalMinistries' => [],
            'sabbathPrograms' => $sabbathPrograms,
            'midweekPrograms' => $midweekPrograms,
            
            // Health & Lifestyle Feature
            'healthCategory' => \App\Models\ArticleCategory::where('slug', 'health-lifestyle')->first(),
            'healthArticles' => \App\Models\Article::whereHas('category', function($q) {
                $q->where('slug', 'health-lifestyle');
            })->where('status', 'published')->orderBy('published_at', 'desc')->get(),
        ]);
    }
}
