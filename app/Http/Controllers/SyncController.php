<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Http;

class SyncController extends Controller
{
    /**
     * Download and sync the records.
     * Can be called from Artisan or a job.
     */
    public function __invoke()
    {
        $time_start = microtime(true);
        echo '<pre>';
    
        $this->syncClones('hydephp/framework');
        $this->syncClones('hydephp/hyde');
        $this->syncClones('hydephp/hydefront');

        echo "\n\nDone. Finished in " . (microtime(true) - $time_start) * 1000 . "ms\n";
    }

    protected function syncClones($repository)
    {
        echo "\nSyncing clone traffic for $repository\n\n";    
        $type = 'traffic/clones';

        echo "Requesting response from GitHub\n";
        $response = Http::withToken(config('services.github.token'))->withHeaders([
            'Accept' => 'application/vnd.github.v3+json',
            'User-Agent' => 'github.com/caendesilva',
        ])->get('https://api.github.com/repos/' . $repository . '/' . $type);

        echo "Got response: ".$response->status() ." \n";

        foreach($response->object()->clones as $clone) {
            $this->syncEvent($repository, $type, $clone);
        }
    }
  
    protected function syncEvent($repository, $type, $event)
    {
        echo " > Syncing event: ".$event->timestamp."\n";
        $event = Event::where([
            'repository' => $repository,
            'type' => $type,
            'bucket' => $event->timestamp,
        ])->firstOrCreate([
            'repository' => $repository,
            'type' => $type,
            'bucket' => $event->timestamp,
            'total' => $event->count,
            'unique' => $event->uniques,
        ]);

        $event->save();
    }
}
