<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
            }, []),
            'focus' => now()->format('Y-m-d'),
            'datatable' => Schedule::with(['section', 'subsection'])->whereMonth('created', now()->format('m'))->get()
        ]);
    }

    public function show(Request $request, $date)
    {
        $selected = Carbon::createFromFormat('Y-m-d', $date);
        return response()->json([
            'datatable' => Schedule::with(['section', 'subsection'])->whereMonth('created', $selected->format('m'))->get()
        ]);
    }
}
