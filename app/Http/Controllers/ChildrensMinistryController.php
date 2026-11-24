<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChildrensMinistryController extends Controller
{
    public function index()
    {
        // Mock data structured to easily swap for real eloquent models later.

        $ageGroups = [
            [
                'name' => 'Beginners',
                'age_range' => 'Ages 0 - 2',
                'description' => 'A safe, loving environment where our youngest discover God\'s love through songs and simple stories.',
                'color' => 'bg-rose-100 text-rose-600',
                'icon' => 'baby'
            ],
            [
                'name' => 'Kindergarten',
                'age_range' => 'Ages 3 - 5',
                'description' => 'Interactive learning, crafts, and joyful worship designed for curious little minds.',
                'color' => 'bg-amber-100 text-amber-600',
                'icon' => 'sun'
            ],
            [
                'name' => 'Primary',
                'age_range' => 'Ages 6 - 9',
                'description' => 'Engaging Bible lessons and activities that help children build a solid faith foundation.',
                'color' => 'bg-emerald-100 text-emerald-600',
                'icon' => 'book'
            ],
            [
                'name' => 'Juniors',
                'age_range' => 'Ages 10 - 12',
                'description' => 'Deepening biblical understanding and encouraging personal relationships with Jesus.',
                'color' => 'bg-sky-100 text-sky-600',
                'icon' => 'users'
            ],
            [
                'name' => 'Teens',
                'age_range' => 'Ages 13 - 15',
                'description' => 'A transition group preparing youth for deeper spiritual maturity and church involvement.',
                'color' => 'bg-purple-100 text-purple-600',
                'icon' => 'star'
            ]
        ];

        $bibleStories = \App\Models\BibleStory::where('is_published', true)
                            ->orderBy('order')
                            ->orderBy('created_at', 'desc')
                            ->get();

        $activities = [
            ['title' => 'Coloring Pages', 'icon' => 'palette', 'action' => 'Download', 'color' => 'bg-pink-500'],
            ['title' => 'Bible Quizzes', 'icon' => 'help-circle', 'action' => 'Play', 'color' => 'bg-blue-500'],
            ['title' => 'Sing Along', 'icon' => 'music', 'action' => 'Listen', 'color' => 'bg-orange-500'],
            ['title' => 'Craft Ideas', 'icon' => 'scissors', 'action' => 'Create', 'color' => 'bg-green-500'],
        ];

        $events = [
            [
                'title' => 'Children\'s Sabbath',
                'date' => 'October 15, 2026',
                'time' => '9:00 AM - 1:00 PM',
                'location' => 'Main Sanctuary',
                'description' => 'A special Sabbath day entirely led by our wonderful children.',
                'image' => 'https://images.unsplash.com/photo-1511895426328-dc8714191300?auto=format&fit=crop&q=80&w=600'
            ],
            [
                'title' => 'Vacation Bible School',
                'date' => 'December 5-10, 2026',
                'time' => '8:30 AM - 12:30 PM',
                'location' => 'Church Grounds',
                'description' => 'A week of fun, faith, friends, and fantastic Bible adventures!',
                'image' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&q=80&w=600'
            ]
        ];

        $gallery = [
            'https://images.unsplash.com/photo-1511895426328-dc8714191300?auto=format&fit=crop&q=80&w=600',
            'https://images.unsplash.com/photo-1502086223501-7ea6ecd79368?auto=format&fit=crop&q=80&w=600',
            'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?auto=format&fit=crop&q=80&w=600',
            'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&q=80&w=600',
            'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&q=80&w=600',
            'https://images.unsplash.com/photo-1473643085206-81a2da3cd3e2?auto=format&fit=crop&q=80&w=600'
        ];

        return view('childrens-ministry.index', compact('ageGroups', 'bibleStories', 'activities', 'events', 'gallery'));
    }
}
