<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timeline;
use Carbon\Carbon;

class TimelineController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified']);
    }

    public function getTimeline(Request $request)
    {
        $timeline = Timeline::find($request['id']);
        return response()->json(['datetime' => $timeline->DateTime]);
    }
}
