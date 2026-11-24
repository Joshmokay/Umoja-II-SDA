<?php

namespace App\Http\Controllers;

use App\Services\SabbathSchoolService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SabbathSchoolController extends Controller
{
    protected $ssService;

    public function __construct(SabbathSchoolService $ssService)
    {
        $this->ssService = $ssService;
    }

    public function index()
    {
        $languages = $this->ssService->getLanguages();
        
        // Fetch featured quarters for English and Swahili to show on landing page
        $featuredQuarters = [];
        foreach (['en', 'sw'] as $lang) {
            $quarters = $this->ssService->getQuarters($lang);
            // Group by category to show one of each main type
            $byCategory = [];
            foreach ($quarters as $q) {
                if (!isset($byCategory[$q['category']])) {
                    $byCategory[$q['category']] = $q;
                }
            }
            $featuredQuarters[$lang] = array_slice($byCategory, 0, 4); // Limit to 4
        }

        return view('sabbath-school.index', compact('languages', 'featuredQuarters'));
    }

    public function languageIndex($lang)
    {
        $languages = $this->ssService->getLanguages();
        if (!array_key_exists($lang, $languages)) {
            abort(404, 'Language not found');
        }

        $categories = $this->ssService->getCategories($lang);
        $allQuarters = $this->ssService->getQuarters($lang);
        
        $quartersByCategory = [
            'adult' => ['name' => 'Adult Bible Study Guide', 'quarters' => []],
            'easy_reading' => ['name' => 'Easy Reading Edition', 'quarters' => []],
            'youth' => ['name' => 'Collegiate / Youth', 'quarters' => []],
            'children' => ['name' => 'Children\'s Lessons', 'quarters' => []],
        ];

        foreach ($allQuarters as $q) {
            $cat = $q['category'] ?? 'default';
            
            if ($cat === 'default') {
                $quartersByCategory['adult']['quarters'][] = $q;
            } elseif ($cat === 'er') {
                $quartersByCategory['easy_reading']['quarters'][] = $q;
            } elseif (in_array($cat, ['cq', 'iv', 'cc', 'rt'])) {
                $q['sub_category'] = $categories[$cat]['name'] ?? 'Youth';
                $quartersByCategory['youth']['quarters'][] = $q;
            } elseif (in_array($cat, ['pp', 'pr', 'kd', 'bg']) || str_contains($cat, 'zaij') || str_contains($cat, 'yaij')) {
                $q['sub_category'] = $categories[$cat]['name'] ?? 'Children';
                $quartersByCategory['children']['quarters'][] = $q;
            } else {
                // Fallback for unknown categories
                $quartersByCategory['adult']['quarters'][] = $q;
            }
        }

        // Precompute the "READ LESSON" URL so it goes directly to the active lesson/pdf
        foreach ($quartersByCategory as $catKey => &$catData) {
            foreach ($catData['quarters'] as &$q) {
                // By default, fallback to quarter overview
                $q['read_url'] = route('sabbath-school.quarter', ['lang' => $lang, 'quarter' => $q['id']]);
                
                // Try to find the current active week
                $quarterDetails = $this->ssService->getQuarter($lang, $q['id']);
                if ($quarterDetails && !empty($quarterDetails['weeks'])) {
                    $currentWeek = $this->ssService->getCurrentWeekForQuarter($quarterDetails);
                    if ($currentWeek) {
                        if (!empty($currentWeek['is_pdf_only']) && !empty($currentWeek['pdf_target'])) {
                            // Direct to PDF Reader
                            $q['read_url'] = route('sabbath-school.read', ['lang' => $lang, 'quarter' => $q['id'], 'id' => $currentWeek['pdf_target']]);
                        } elseif (!empty($currentWeek['days'])) {
                            // Direct to first day of the week
                            $q['read_url'] = route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $q['id'], 'week' => $currentWeek['id'], 'day' => $currentWeek['days'][0]]);
                        }
                    }
                }
            }
        }

        $langName = $languages[$lang];

        return view('sabbath-school.language', compact('lang', 'langName', 'quartersByCategory'));
    }

    public function quarter($lang, $quarterId)
    {
        $quarter = $this->ssService->getQuarter($lang, $quarterId);
        
        if (!$quarter) {
            abort(404, 'Quarter not found');
        }

        $languages = $this->ssService->getLanguages();
        $langName = $languages[$lang] ?? strtoupper($lang);

        $featuredWeek = null;
        $otherWeeks = [];

        // Determine category (default is Adult)
        $isAdult = ($quarter['category'] ?? 'default') === 'default';

        if ($isAdult && !empty($quarter['weeks'])) {
            $featuredWeek = $this->ssService->getCurrentWeekForQuarter($quarter);
            
            foreach ($quarter['weeks'] as &$week) {
                // Populate memory text for the view
                if (!empty($week['days'])) {
                    $firstDay = $week['days'][0];
                    $meta = $this->ssService->extractLessonMetadata($lang, $quarterId, $week['id'], $firstDay);
                    $week['memory_verse'] = $meta['memory_verse'];
                }
                
                if ($featuredWeek && $week['id'] === $featuredWeek['id']) {
                    $featuredWeek = $week; // Keep populated reference
                } else {
                    $otherWeeks[] = $week;
                }
            }
        }

        return view('sabbath-school.quarter', compact('quarter', 'lang', 'langName', 'quarterId', 'isAdult', 'featuredWeek', 'otherWeeks'));
    }

    public function read($lang, $quarterId, $id)
    {
        $quarter = $this->ssService->getQuarter($lang, $quarterId);
        if (!$quarter) abort(404, 'Quarter not found');

        $languages = $this->ssService->getLanguages();
        $langName = $languages[$lang] ?? strtoupper($lang);

        $resource = null;
        $fileType = 'unknown';

        // 1. Check if it's a PDF
        if (isset($quarter['media']['pdf'])) {
            foreach ($quarter['media']['pdf'] as $item) {
                // target can be "en/2026-03-cc/01", we just want the last part
                $targetId = basename($item['target'] ?? '');
                if ($targetId === $id || ($item['target'] ?? '') === $id) {
                    $resource = $item;
                    $fileType = 'pdf';
                    break;
                }
            }
        }

        // 2. Check if it's an Image collection
        if (!$resource && isset($quarter['media']['images'])) {
            foreach ($quarter['media']['images'] as $item) {
                $targetId = basename($item['target'] ?? '');
                if ($targetId === $id || ($item['target'] ?? '') === $id) {
                    $resource = $item;
                    $fileType = 'image';
                    break;
                }
            }
        }

        // 3. Fallback to Markdown/Text if we assume $id is a day in a week?
        // Wait, regular lessons pass week/day, so this route is mainly for media target IDs.
        
        if (!$resource) {
            abort(404, 'Resource not found in this quarter');
        }

        return view('sabbath-school.reader', compact(
            'lang', 'langName', 'quarter', 'quarterId', 'id', 'resource', 'fileType'
        ));
    }

    public function lesson($lang, $quarterId, $weekId, $dayId)
    {
        $quarter = $this->ssService->getQuarter($lang, $quarterId);
        
        if (!$quarter) {
            abort(404, 'Quarter not found');
        }

        $lesson = $this->ssService->getLesson($lang, $quarterId, $weekId, $dayId);

        if (!$lesson) {
            abort(404, 'Lesson not found');
        }

        // Build navigation (Previous/Next)
        $weeks = $quarter['weeks'] ?? [];
        $allDays = [];
        $currentWeekTitle = '';
        $currentWeek = null;
        
        foreach ($weeks as $w) {
            if ($w['id'] === $weekId) {
                $currentWeekTitle = $w['title'] ?? 'Week ' . $w['id'];
                
                // Add memory verse to the current week
                if (!empty($w['days'])) {
                    $firstDay = $w['days'][0];
                    $meta = $this->ssService->extractLessonMetadata($lang, $quarterId, $w['id'], $firstDay);
                    $w['memory_verse'] = $meta['memory_verse'];
                }
                
                $currentWeek = $w;
            }
            foreach ($w['days'] as $d) {
                $allDays[] = [
                    'week' => $w['id'],
                    'day' => $d,
                    'weekTitle' => $w['title'] ?? 'Week ' . $w['id']
                ];
            }
        }
        
        $currentIndex = -1;
        foreach ($allDays as $idx => $d) {
            if ($d['week'] === $weekId && $d['day'] === $dayId) {
                $currentIndex = $idx;
                break;
            }
        }

        $prevDay = $currentIndex > 0 ? $allDays[$currentIndex - 1] : null;
        $nextDay = $currentIndex >= 0 && $currentIndex < count($allDays) - 1 ? $allDays[$currentIndex + 1] : null;

        $languages = $this->ssService->getLanguages();
        $langName = $languages[$lang] ?? strtoupper($lang);

        $isAdult = ($quarter['category'] ?? 'default') === 'default';

        return view('sabbath-school.lesson', compact(
            'lang', 'langName', 'quarter', 'quarterId', 'weekId', 'dayId', 
            'lesson', 'prevDay', 'nextDay', 'currentWeekTitle', 'currentWeek', 'isAdult'
        ));
    }

    public function asset($lang, $quarterId, $file)
    {
        // Simple security check to prevent directory traversal
        if (strpos($file, '..') !== false || strpos($file, '/') !== false) {
            abort(404);
        }

        $path = base_path("sabbath-school-lessons-stage/src/{$lang}/{$quarterId}/{$file}");

        if (!File::exists($path)) {
            abort(404);
        }

        $mimeType = File::mimeType($path);

        return response()->file($path, [
            'Content-Type' => $mimeType,
            'Cache-Control' => 'public, max-age=86400'
        ]);
    }
}
