<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Yaml\Yaml;

class SabbathSchoolService
{
    protected $basePath;

    public function __construct()
    {
        $this->basePath = base_path('sabbath-school-lessons-stage/src');
    }

    protected function parseYamlFile($path)
    {
        $content = File::get($path);
        $content = preg_replace('/^---\s*[\r\n]+/', '', $content);
        
        $lines = explode("\n", $content);
        $minIndent = PHP_INT_MAX;
        foreach ($lines as $line) {
            if (trim($line) === '') continue;
            if (preg_match('/^(\s+)/', $line, $matches)) {
                $minIndent = min($minIndent, strlen($matches[1]));
            } else {
                $minIndent = 0;
                break;
            }
        }
        
        if ($minIndent > 0 && $minIndent !== PHP_INT_MAX) {
            $content = preg_replace('/^ {' . $minIndent . '}/m', '', $content);
        }
        
        return Yaml::parse($content) ?? [];
    }

    public function getLanguages()
    {
        return Cache::remember('ss_languages', 3600, function () {
            $languages = [];
            
            // From README.md, we prioritize these two for now, but we can dynamically detect them
            $priorities = ['en', 'sw'];
            
            foreach ($priorities as $langCode) {
                $infoPath = $this->basePath . '/' . $langCode . '/info.yml';
                if (File::exists($infoPath)) {
                    $info = $this->parseYamlFile($infoPath);
                    $languages[$langCode] = $info['name'] ?? strtoupper($langCode);
                } else {
                    $languages[$langCode] = strtoupper($langCode);
                }
            }

            return $languages;
        });
    }

    public function getCategories($lang)
    {
        return Cache::remember("ss_categories_{$lang}", 3600, function () use ($lang) {
            $groupsPath = $this->basePath . '/' . $lang . '/groups.yml';
            if (File::exists($groupsPath)) {
                $groups = $this->parseYamlFile($groupsPath);
                // Sort by order
                uasort($groups, function ($a, $b) {
                    return ($a['order'] ?? 999) <=> ($b['order'] ?? 999);
                });
                return $groups;
            }
            // Default for Swahili and others that don't have groups.yml
            return ['default' => ['name' => 'Standard Adult']];
        });
    }

    public function getQuarters($lang)
    {
        return Cache::remember("ss_quarters_{$lang}", 3600, function () use ($lang) {
            $langPath = $this->basePath . '/' . $lang;
            if (!File::exists($langPath)) {
                return [];
            }

            $directories = File::directories($langPath);
            $quarters = [];

            foreach ($directories as $dir) {
                $basename = basename($dir);
                // Quarter formats: YYYY-QQ or YYYY-QQ-TYPE
                if (preg_match('/^(\d{4}-\d{2})(?:-(.+))?$/', $basename, $matches)) {
                    $infoPath = $dir . '/info.yml';
                    if (File::exists($infoPath)) {
                        $info = $this->parseYamlFile($infoPath);
                        $type = $matches[2] ?? 'default';
                        $info['id'] = $basename;
                        $info['category'] = $type;
                        $quarters[] = $info;
                    }
                }
            }

            // Sort by ID descending (newest first)
            usort($quarters, function ($a, $b) {
                return strcmp($b['id'], $a['id']);
            });

            return $quarters;
        });
    }

    public function getQuarter($lang, $quarterId)
    {
        return Cache::remember("ss_quarter_{$lang}_{$quarterId}", 3600, function () use ($lang, $quarterId) {
            $quarterPath = $this->basePath . '/' . $lang . '/' . $quarterId;
            $infoPath = $quarterPath . '/info.yml';

            if (!File::exists($infoPath)) {
                return null;
            }

            $info = $this->parseYamlFile($infoPath);
            $info['id'] = $quarterId;
            
            if (preg_match('/^(\d{4}-\d{2})(?:-(.+))?$/', $quarterId, $matches)) {
                $info['category'] = $matches[2] ?? 'default';
            } else {
                $info['category'] = 'default';
            }

            $info['weeks'] = [];

            // Find weeks (folders 01, 02, etc.)
            $directories = File::directories($quarterPath);
            foreach ($directories as $dir) {
                $basename = basename($dir);
                if (is_numeric($basename)) {
                    $weekInfoPath = $dir . '/info.yml';
                    if (File::exists($weekInfoPath)) {
                        $weekInfo = $this->parseYamlFile($weekInfoPath);
                        $weekInfo['id'] = $basename;
                        
                        // Discover days in this week
                        $days = [];
                        $files = File::files($dir);
                        foreach ($files as $file) {
                            if ($file->getExtension() === 'md') {
                                $dayId = $file->getFilenameWithoutExtension();
                                // We don't read the full file here to save time, just note it exists
                                $days[] = $dayId;
                            }
                        }
                        sort($days);
                        $weekInfo['days'] = $days;
                        
                        $info['weeks'][] = $weekInfo;
                    }
                }
            }

            // Sort weeks by ID
            usort($info['weeks'], function ($a, $b) {
                return strcmp($a['id'], $b['id']);
            });

            // Parse Media and Introduction for quarters without traditional weeks (like CC, RT, PP)
            $info['media'] = [];
            foreach (['pdf.yml', 'video.yml', 'audio.yml'] as $mediaFile) {
                if (File::exists($quarterPath . '/' . $mediaFile)) {
                    $key = str_replace('.yml', '', $mediaFile);
                    $parsed = $this->parseYamlFile($quarterPath . '/' . $mediaFile);
                    // Extract the nested array if the YAML uses the key as a root element
                    if (is_array($parsed) && isset($parsed[$key])) {
                        $parsed = $parsed[$key];
                    }
                    $info['media'][$key] = $parsed;
                }
            }

            // If no traditional weeks exist, try to build weeks from PDF files
            if (empty($info['weeks']) && !empty($info['media']['pdf'])) {
                $pdfWeeks = [];
                foreach ($info['media']['pdf'] as $pdfItem) {
                    // Skip introductions if they don't look like weeks, but keep them if we want
                    $targetId = basename($pdfItem['target'] ?? '');
                    
                    $pdfWeeks[] = [
                        'id' => $targetId,
                        'title' => $pdfItem['title'] ?? 'Lesson',
                        'start_date' => $pdfItem['start_date'] ?? null,
                        'end_date' => $pdfItem['end_date'] ?? null,
                        'is_pdf_only' => true,
                        'pdf_target' => $targetId,
                    ];
                }
                $info['weeks'] = $pdfWeeks;
            }

            if (File::exists($quarterPath . '/introduction.md')) {
                $introContent = File::get($quarterPath . '/introduction.md');
                if (preg_match('/^---\s*[\r\n]+(.*?)\s*[\r\n]+---\s*[\r\n]+(.*)$/s', $introContent, $matches)) {
                    $introContent = $matches[2];
                }
                $info['introduction'] = Str::markdown($introContent);
            }

            return $info;
        });
    }

    public function getLesson($lang, $quarterId, $weekId, $dayId)
    {
        $filePath = $this->basePath . '/' . $lang . '/' . $quarterId . '/' . $weekId . '/' . $dayId . '.md';
        
        if (!File::exists($filePath)) {
            return null;
        }

        $content = File::get($filePath);
        $result = [
            'frontmatter' => [],
            'content' => '',
            'html' => ''
        ];

        // Parse YAML Frontmatter
        if (preg_match('/^---\s*[\r\n]+(.*?)\s*[\r\n]+---\s*[\r\n]+(.*)$/s', $content, $matches)) {
            try {
                $result['frontmatter'] = Yaml::parse($matches[1]);
            } catch (\Exception $e) {
                // If YAML parsing fails, proceed without it
            }
            $markdownContent = $matches[2];
        } else {
            $markdownContent = $content;
        }

        // Add support for custom elements like Memory Text
        $markdownContent = $this->processCustomMarkdown($markdownContent);

        $result['content'] = $markdownContent;
        $result['html'] = Str::markdown($markdownContent);

        return $result;
    }

    protected function processCustomMarkdown($content)
    {
        // Add custom processing here if needed, for instance replacing <p> inside blockquotes
        return $content;
    }

    public function getCoverUrl(string $lang, string $quarterId): string
    {
        return route('sabbath-school.asset', [
            'lang' => $lang,
            'quarter' => $quarterId,
            'file' => 'cover.png'
        ]);
    }

    public function getCurrentLesson(string $lang = 'en'): ?array
    {
        return Cache::remember("ss_current_lesson_{$lang}_" . date('Ymd'), 3600, function () use ($lang) {
            $quarters = $this->getQuarters($lang);
            $now = now();
            $currentQuarter = null;

            // 1. Find the current quarter
            foreach ($quarters as $q) {
                if (isset($q['start_date']) && isset($q['end_date'])) {
                    try {
                        $start = \Carbon\Carbon::createFromFormat('d/m/Y', $q['start_date'])->startOfDay();
                        $end = \Carbon\Carbon::createFromFormat('d/m/Y', $q['end_date'])->endOfDay();
                        
                        if ($now->between($start, $end)) {
                            $currentQuarter = $q;
                            break;
                        }
                    } catch (\Exception $e) {
                        continue; // skip if date parsing fails
                    }
                }
            }

            // Fallback to the latest quarter if no matching quarter found
            if (!$currentQuarter && !empty($quarters)) {
                $currentQuarter = $quarters[0];
            }

            if (!$currentQuarter) return null;

            $quarterDetails = $this->getQuarter($lang, $currentQuarter['id']);
            if (!$quarterDetails || empty($quarterDetails['weeks'])) return null;

            $currentWeek = $this->getCurrentWeekForQuarter($quarterDetails);

            $firstDayId = null;
            if (isset($currentWeek['days']) && count($currentWeek['days']) > 0) {
                $firstDayId = $currentWeek['days'][0];
            }

            $memoryVerse = null;
            $intro = null;

            if ($firstDayId) {
                $lesson = $this->getLesson($lang, $currentQuarter['id'], $currentWeek['id'], $firstDayId);
                if ($lesson) {
                    $html = $lesson['html'];
                    if (preg_match('/<blockquote>(.*?)<\/blockquote>/is', $html, $matches)) {
                        $memoryVerse = strip_tags($matches[1]);
                    }
                    
                    $textWithoutBlockquote = preg_replace('/<blockquote>.*?<\/blockquote>/is', '', $html);
                    $textWithoutBlockquote = preg_replace('/<h[1-6].*?>.*?<\/h[1-6]>/is', '', $textWithoutBlockquote);
                    
                    if (preg_match('/<p>(.*?)<\/p>/is', $textWithoutBlockquote, $matches)) {
                        $intro = strip_tags($matches[1]);
                        if (mb_strlen($intro) > 150) {
                            $intro = mb_substr($intro, 0, 147) . '...';
                        }
                    }
                }
            }

            $currentQuarter['cover_url'] = $this->getCoverUrl($lang, $currentQuarter['id']);

            return [
                'quarter' => $currentQuarter,
                'week' => $currentWeek,
                'first_day' => $firstDayId,
                'memory_verse' => $memoryVerse,
                'intro' => $intro,
            ];
        });
    }

    public function getCurrentWeekForQuarter(array $quarterDetails): ?array
    {
        if (empty($quarterDetails['weeks'])) return null;

        $now = now();
        $currentWeek = null;

        foreach ($quarterDetails['weeks'] as $week) {
            if (isset($week['start_date']) && isset($week['end_date'])) {
                try {
                    $start = \Carbon\Carbon::createFromFormat('d/m/Y', $week['start_date'])->startOfDay();
                    $end = \Carbon\Carbon::createFromFormat('d/m/Y', $week['end_date'])->endOfDay();
                    
                    if ($now->between($start, $end)) {
                        $currentWeek = $week;
                        break;
                    }
                } catch (\Exception $e) {
                    continue;
                }
            }
        }

        if (!$currentWeek) {
            $currentWeek = $quarterDetails['weeks'][count($quarterDetails['weeks']) - 1];
            if (isset($quarterDetails['start_date'])) {
                try {
                    $qStart = \Carbon\Carbon::createFromFormat('d/m/Y', $quarterDetails['start_date'])->startOfDay();
                    if ($now->isBefore($qStart)) {
                        $currentWeek = $quarterDetails['weeks'][0];
                    }
                } catch (\Exception $e) {
                    // ignore
                }
            }
        }

        return $currentWeek;
    }

    public function extractLessonMetadata(string $lang, string $quarterId, string $weekId, string $dayId): array
    {
        return Cache::remember("ss_lesson_meta_{$lang}_{$quarterId}_{$weekId}_{$dayId}", 3600, function () use ($lang, $quarterId, $weekId, $dayId) {
            $lesson = $this->getLesson($lang, $quarterId, $weekId, $dayId);
            if (!$lesson) {
                return ['memory_verse' => null, 'intro' => null];
            }

            $html = $lesson['html'];
            $memoryVerse = null;
            
            if (preg_match('/<blockquote>(.*?)<\/blockquote>/is', $html, $matches)) {
                $memoryVerse = strip_tags($matches[1]);
            }
            
            $textWithoutBlockquote = preg_replace('/<blockquote>.*?<\/blockquote>/is', '', $html);
            $textWithoutBlockquote = preg_replace('/<h[1-6].*?>.*?<\/h[1-6]>/is', '', $textWithoutBlockquote);
            
            $intro = null;
            if (preg_match('/<p>(.*?)<\/p>/is', $textWithoutBlockquote, $matches)) {
                $intro = strip_tags($matches[1]);
                if (mb_strlen($intro) > 200) {
                    $intro = mb_substr($intro, 0, 197) . '...';
                }
            }

            return [
                'memory_verse' => $memoryVerse,
                'intro' => $intro
            ];
        });
    }
}
