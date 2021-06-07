<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Rubro;
use App\Models\Informe;
use App\Models\InformesPlanificadas;
use App\Models\InformesRealizadas;
use Livewire\Component;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RequestUpdateUser;
class Modal extends Component
{


    public $fecha_inicio_realizadas = '';
    public $fecha_fin_realizadas = '';
    public $fecha_inicio_planificadas = '' ;
    public $fecha_fin_planificadas = '';
    public $tituloModal ='';
    public $nombre_rubro_realizadas = '';
    public $descripcion_rubro_realizadas = '';
    public $horas_solas_realizadas = '' ;

    public $open = false;



    protected $listeners = [
        'abrirModal',
        'editModal',

    ];


    public function save(){
        Informe::create([
            'usuario_id' => Auth::user()->id,
            'fecha_inicio_realizadas' => $this->fecha_inicio_realizadas,
            'fecha_fin_realizadas' => $this->fecha_fin_realizadas,
            'fecha_inicio_planificadas'=>$this->fecha_inicio_planificadas,
            'fecha_fin_planificadas' =>$this->fecha_fin_planificadas,

        ]);

        $this->cerrarModal();
       /*  $this->reset(['open','fecha_inicio_realizadas','fecha_fin_realizadas','fecha_inicio_planificadas','fecha_fin_planificadas']); */

        $this->emit('informeList');
    }
    public function render()
    {

        $rubros = Rubro::all();

        $informesPlanificadas = InformesPlanificadas::all();
        $informesRealizadas = InformesRealizadas::all();

        return view('livewire.modal', [
            'rubros'=>$rubros,
            'informesPlanificadas'=> $informesPlanificadas,
            'informesRealizadas' => $informesRealizadas,
            ]);
    }


    public function saveDescripcion(){
        InformesRealizadas::create([
            'id_informe_realizadas' => Auth::user()->id,
            'nombre_rubro_realizadas' => $this->nombre_rubro_realizadas,
            'descripcion_rubro_realizadas' => $this->descripcion_rubro_realizadas,
            'horas_solas_realizadas'=>$this->horas_solas_realizadas,
        ]);

        $this->emit('saveDescripcion');
         $this->nombre_rubro_realizadas = '';
         $this->descripcion_rubro_realizadas = '';
         $this->horas_solas_realizadas = '' ;


    }

    public function sumarHoras() {
      /* $test = InformesRealizadas::select('horas_solas_realizadas')->get(); */


    }

    public function abrirModal()
    {
        $this->tituloModal = 'Nuevo Informe';
        $this->open = true;
    }

    public function editModal()
    {
        $this->tituloModal = 'Editar Informe';
        $this->open = true;
    }

    public function cerrarModal()
    {
        $this->open = false;
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();
    }
}
