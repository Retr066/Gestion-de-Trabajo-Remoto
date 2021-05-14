<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Informe;
use Livewire\Component;
use Auth;
use App\Http\Requests\RequestUpdateUser;
class Modal extends Component
{


    public $fecha_inicio_realizadas ;
    public $fecha_fin_realizadas ;
    public $fecha_inicio_planificadas ;
    public $fecha_fin_planificadas ;


    public $open = false;



    protected $listeners = [
        'abrirModal',

    ];
  /*   protected $listeners = [
        'showModal' => 'sacarModal',
        'showModalNewUser' => 'sacarModalNuevo'
    ]; */


    public function save(){
        Informe::create([
            'usuario_id' => Auth::user()->id,
            'fecha_inicio_realizadas' => $this->fecha_inicio_realizadas,
            'fecha_fin_realizadas' => $this->fecha_fin_realizadas,
            'fecha_inicio_planificadas'=>$this->fecha_inicio_planificadas,
            'fecha_fin_planificadas' =>$this->fecha_fin_planificadas,

        ]);
        $this->reset(['open','fecha_inicio_realizadas','fecha_fin_realizadas','fecha_inicio_planificadas','fecha_fin_planificadas']);
        $this->modalrefresh = 1;
        $this->emit('informeList');
    }
    public function render()
    {
        return view('livewire.modal');
    }

    public function abrirModal()
    {
        $this->open = true;
    }

    public function cerrarModal()
    {
        $this->open = false;

    }
}
