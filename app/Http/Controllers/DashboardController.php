<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $schedules = Schedule::all();
        return response()->json([
            'events' => $schedules->reduce(function ($carry, $item) {
                array_push($carry, [
                    'name' => $item->name,
                    'start' => $item->created,
                    'end' => $item->created,
                    'color' => 'blue',
                    'timed' => false,

                ]);
                return $carry;
            }, [])
        ]);
    }
}
