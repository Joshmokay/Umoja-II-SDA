<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ChurchProgram;
use App\Models\ProgramActivity;
use Illuminate\Support\Facades\DB;

class ChurchProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Clear existing to avoid duplicates
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ChurchProgram::truncate();
        ProgramActivity::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. Morning Devotion
        $morning = ChurchProgram::create([
            'title' => 'Morning Devotion',
            'day' => 'Saturday',
            'start_time' => '08:00:00',
            'end_time' => '08:20:00',
            'category' => 'Morning',
            'is_recurring' => true,
            'is_active' => true,
            'order' => 1
        ]);

        $morning->activities()->createMany([
            ['name' => 'Song Service', 'description' => 'Choristers', 'start_time' => '08:00:00', 'end_time' => '08:10:00', 'order' => 1],
            ['name' => 'Devotion', 'start_time' => '08:10:00', 'end_time' => '08:20:00', 'order' => 2],
        ]);

        // 2. Sabbath School
        $sabbathSchool = ChurchProgram::create([
            'title' => 'Sabbath School',
            'day' => 'Saturday',
            'start_time' => '08:20:00',
            'end_time' => '10:45:00',
            'category' => 'Morning',
            'is_recurring' => true,
            'is_active' => true,
            'order' => 2
        ]);

        $sabbathSchool->activities()->createMany([
            ['name' => 'Opening Prayer, Welcome, Mission Story', 'order' => 1],
            ['name' => 'Special Item / Report', 'order' => 2],
            ['name' => 'Lesson Discussion', 'description' => 'In classes', 'start_time' => '09:00:00', 'end_time' => '09:55:00', 'order' => 3],
            ['name' => 'Lesson Introduction & Congregational Singing', 'start_time' => '09:55:00', 'end_time' => '10:00:00', 'order' => 4],
            ['name' => 'Song Service', 'description' => 'Choristers', 'start_time' => '10:00:00', 'end_time' => '10:30:00', 'order' => 5],
            ['name' => 'Announcements & Promotions', 'start_time' => '10:30:00', 'end_time' => '10:45:00', 'order' => 6],
        ]);

        // 3. Divine Service
        $divineService = ChurchProgram::create([
            'title' => 'Divine Service',
            'day' => 'Saturday',
            'start_time' => '10:45:00',
            'end_time' => '13:00:00',
            'category' => 'Midday',
            'is_recurring' => true,
            'is_active' => true,
            'order' => 3
        ]);

        $divineService->activities()->createMany([
            ['name' => 'Doxology & Invocation', 'order' => 1],
            ['name' => 'Welcome & Introduction', 'order' => 2],
            ['name' => 'Scripture Reading & Hymn of Praise', 'order' => 3],
            ['name' => 'Pastoral Prayer', 'order' => 4],
            ['name' => 'Tithes & Offering', 'order' => 5],
            ['name' => 'Special Item & Children\'s Sermon', 'order' => 6],
            ['name' => 'Sermon', 'order' => 7],
            ['name' => 'Closing Hymn & Benediction', 'order' => 8],
        ]);

        // 4. Afternoon Program
        $afternoon = ChurchProgram::create([
            'title' => 'Afternoon Program',
            'day' => 'Saturday',
            'start_time' => '14:00:00',
            'end_time' => '17:30:00',
            'category' => 'Afternoon',
            'is_recurring' => true,
            'is_active' => true,
            'order' => 4
        ]);

        $afternoon->activities()->createMany([
            ['name' => 'Song Service', 'start_time' => '14:00:00', 'end_time' => '14:30:00', 'order' => 1],
            ['name' => 'Bible Study', 'start_time' => '14:30:00', 'end_time' => '16:00:00', 'order' => 2],
            ['name' => 'Departmental Programs', 'start_time' => '16:30:00', 'end_time' => '17:30:00', 'order' => 3],
        ]);

        // 5. Mid-Week Vespers (Wednesday)
        ChurchProgram::create([
            'title' => 'Prayer Meeting',
            'day' => 'Wednesday',
            'start_time' => '18:30:00',
            'end_time' => '19:30:00',
            'category' => 'Mid-week',
            'is_recurring' => true,
            'is_active' => true,
            'order' => 5
        ]);

        // 6. Mid-Week Vespers (Friday)
        ChurchProgram::create([
            'title' => 'Vespers',
            'day' => 'Friday',
            'start_time' => '18:30:00',
            'end_time' => '19:30:00',
            'category' => 'Mid-week',
            'is_recurring' => true,
            'is_active' => true,
            'order' => 6
        ]);
    }
}
