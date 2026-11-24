<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Article;
use App\Models\Sermon;
use App\Models\PrayerRequest;
use App\Models\GalleryImage;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard with dynamic statistics.
     */
    public function index()
    {
        // 1. Statistics Cards Data
        $stats = [
            'total_events' => Event::count(),
            'total_articles' => Article::count(),
            'total_sermons' => Sermon::count(),
            'total_prayer_requests' => PrayerRequest::count(),
            'total_gallery_items' => GalleryImage::count(),
        ];

        // 2. Upcoming Events (from today onwards)
        $upcomingEvents = Event::where('start_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->take(4)
            ->get();

        // 3. Recent Content (Articles for now)
        $recentArticles = Article::with('category')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // 4. Prayer Requests Summary (Secure Metadata only)
        $prayerSummary = [
            'total' => $stats['total_prayer_requests'],
            'new_this_week' => PrayerRequest::where('created_at', '>=', now()->subDays(7))->count(),
        ];

        return view('dashboard', compact(
            'stats',
            'upcomingEvents',
            'recentArticles',
            'prayerSummary'
        ));
    }
}
