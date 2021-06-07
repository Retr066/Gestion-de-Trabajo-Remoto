<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ComponentModalRubro extends Component
{

    /**

     * Create a new component instance.
     *
     * @return void
     */

     public $showModal;
     public $action;

    public function __construct(string $showModal, string $action)
    {
        $this->showModal = $showModal;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.component-modal-rubro');
    }
}
