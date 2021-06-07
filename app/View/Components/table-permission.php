<?php

namespace App\View\Components;

use Illuminate\View\Component;

class table-permission extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $caption


    public function __construct(string $caption)
    {
        $this->caption = $caption
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-permission');
    }
}
