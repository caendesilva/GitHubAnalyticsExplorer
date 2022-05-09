<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('welcome', [
            'events' => Event::all(),
            'clonesHyde' => Event::where('type', 'traffic/clones')
                ->where('repository', 'hydephp/hyde')
                ->get()->sortBy('bucket'),

            'clonesFramework' => Event::where('type', 'traffic/clones')
                ->where('repository', 'hydephp/framework')
                ->get()->sortBy('bucket'),

            'clonesHydeFront' => Event::where('type', 'traffic/clones')
                ->where('repository', 'hydephp/hydefront')
                ->get()->sortBy('bucket'),

            'viewsHyde' => Event::where('type', 'traffic/views')
                ->where('repository', 'hydephp/hyde')
                ->get()->sortBy('bucket'),

            'viewsFramework' => Event::where('type', 'traffic/views')
                ->where('repository', 'hydephp/framework')
                ->get()->sortBy('bucket'),

            'viewsHydeFront' => Event::where('type', 'traffic/views')
                ->where('repository', 'hydephp/hydefront')
                ->get()->sortBy('bucket'),

            'dateRange' => $this->getDateRange()
        ]);
    }

    protected function getDateRange(): array
    {
        $oldest = Event::min('bucket');
        $newest = Event::max('bucket');

        // Map all dates between oldest and newest
        $range = [];
        $current = $oldest;
        while ($current <= $newest) {
            $range[] = \Carbon\Carbon::parse($current)->format('Y-m-d');
            $current = \Carbon\Carbon::parse($current)->addDay()->format('Y-m-d');
        }

        return array_reverse($range);
    }
}
