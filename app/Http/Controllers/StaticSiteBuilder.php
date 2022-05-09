<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StaticSiteBuilder extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $time_start = microtime(true);
        
        ob_end_clean();

        echo "<h1>Compiling static site</h1>\n";
        echo "<pre>\n";
        echo "<h2>Compiling views</h2>";    

        // Make sure to run in a seperate process

        echo "Compiling index.html ";    
        $process_start = microtime(true);
        file_put_contents(base_path('docs/index.html'), Http::get('localhost:8000/')->body());
        echo round((microtime(true) - $process_start) * 1000, 2) . "ms\n";

        echo "Compiling table.html ";    
        $process_start = microtime(true);
        file_put_contents(base_path('docs/table.html'), Http::get('localhost:8000/table')->body());
        echo round((microtime(true) - $process_start) * 1000, 2) . "ms\n";

        echo "<h2>Downloading data</h2>"; 
        
        echo "Downloading table.json ";    
        $process_start = microtime(true);
        file_put_contents(base_path('docs/table.json'), Http::get('localhost:8000/table.json')->body());
        echo round((microtime(true) - $process_start) * 1000, 2) . "ms\n";

        echo "\n<h2>Done. Finished in " . round((microtime(true) - $time_start) * 1000, 2). "ms</h2>\n";
    }
}
