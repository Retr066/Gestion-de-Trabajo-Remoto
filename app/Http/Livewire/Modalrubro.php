<?php

namespace App\Http\Livewire;

use App\Models\Rubro;
use Livewire\Component;

class Modalrubro extends Component
{
    public $showModal = 'hidden';
    public $name ='';
    protected $listeners = [
        'showModal' => 'sacarModal'
    ];

    public function render()
    {
        return view('livewire.modalrubro');
    }

       public function sacarModal(Rubro $rubro)
       {
            $this->name = $rubro->nombre_rubro;
            $this->showModal = '';
       }

       public function cerrarModal()
       {
            $this->showModal = 'hidden';
       }

}
