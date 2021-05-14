<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VerModal extends Component
{

    public $open = false;

    protected $listeners = [
        'abrirModal2',

    ];

    public function abrirModal2()
    {
        $this->open = true;
    }

    public function cerrarModal2()
    {
        $this->open = false;

    }

    public function render()
    {
        return view('livewire.ver-modal');
    }
}
