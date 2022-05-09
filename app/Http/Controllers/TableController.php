<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class TableController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('table', [
            'events' => Event::all()->makeHidden(['created_at', 'updated_at'])->append('time')->toArray(),
        ]);
    }

    public function json(Request $request)
    {
        return Event::all()->makeHidden(['created_at', 'updated_at'])->append('time');
    }
}
