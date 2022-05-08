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
        ]);
    }
}
