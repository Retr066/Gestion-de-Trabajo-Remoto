<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Area;
use Livewire\Component;
use App\Http\Requests\RequestUpdateUser;
class Modal extends Component
{

    public $area;
    public $fecha_inicio_realizadas = '';
    public $fecha_fin_realizadas = '';
    public $fecha_inicio_planificadas = '';
    public $fecha_fin_planificadas = '';

    public $nombreModal = '';

    public $open = false;


  /*   protected $listeners = [
        'showModal' => 'sacarModal',
        'showModalNewUser' => 'sacarModalNuevo'
    ]; */




    /* public function sacarModal(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->nombre_area = $user->r_area->nombre_area;
        $this->role = $user->role;

    } */
    public function save(){
        Area::create([
            'fecha_inicio_realizadas' => $this->fecha_inicio_realizadas,
            'fecha_fin_realizadas' => $this->fecha_fin_realizadas,
            /* 'fecha_inicio_planificadas'=>$this->fecha_inicio_planificadas,
            'fecha_fin_planificadas' =>$this->fecha_fin_planificadas, */
        ]);
        $this->reset(['open','fecha_inicio_realizadas','fecha_fin_realizadas']);
        $this->emit('informeList');
    }
    public function render()
    {
        return view('livewire.modal');
    }
}
