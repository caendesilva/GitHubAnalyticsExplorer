<?php

namespace App\View\Components;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ViewsChart extends Component
{
    /**
     * The events to display.
     */
    public Collection $views;

    /**
     * The HTML ID of the chart.
     */
    public string $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $views)
    {
        $this->views = $views;
        $this->id = 'ch_'.md5($views);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.views-chart');
    }
}
