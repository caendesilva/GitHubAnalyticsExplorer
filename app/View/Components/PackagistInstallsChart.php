<?php

namespace App\View\Components;

use App\Models\Event;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class PackagistInstallsChart extends Component
{
    /**
     * The events to display.
     */
    public Collection $installs;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->installs = Event::where('type', 'composer/installs')
            ->where('repository', 'hyde/framework')
            ->get()->sortBy('bucket');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.packagist-installs-chart');
    }
}
