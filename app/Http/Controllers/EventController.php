<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        // Get all events from today onwards, ordered by start_date ascending
        $events = Event::where('start_date', '>=', Carbon::today())
            ->orderBy('start_date', 'asc')
            ->paginate(12);

        return view('events.index', compact('events'));
    }
}
