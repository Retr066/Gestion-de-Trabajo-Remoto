<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Rubro;
use App\Models\Informe;
use App\Models\InformesPlanificadas;
use App\Models\InformesRealizadas;
use Livewire\Component;

class VerModal extends Component
{

    public $abrir = false;
    public $id_informe = '';
    public $count = 1;

    protected $listeners = [
        'ShowModal'=> 'verModalDescripcion',

    ];

    public function mount(){
        $this->abrir = false;
        $this->count = 1;
    }

    public function render()
    {
        $informesPlanificadas = InformesPlanificadas::where('id_informe_planificadas', $this->id_informe)->get();
        $informesRealizadas = InformesRealizadas::where('id_informe_realizadas',$this->id_informe)->get();
        $informes = Informe::where('id',$this->id_informe)->get();


        return view('livewire.ver-modal',compact('informesRealizadas','informesPlanificadas','informes'));
    }

    public function verModalDescripcion($id_informe)
    {

        $this->abrir = true;
        $this->id_informe = $id_informe;

    }

    public function cerrar()
    {
        $this->reset();

    }

}
