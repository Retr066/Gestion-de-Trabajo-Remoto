<?php

namespace App\Http\Livewire;
use App\Models\InformesPlanificadas;

use Livewire\Component;
use Auth;
use App\Models\Informe;
use Illuminate\Support\Facades\DB;


class MiniTablePlanificadas extends Component
{
    public $can_submit = 'true';
    public $id_informe = '';
    public $horas_total_planificadas = '';
    protected $listeners = [
        'saveDescripcionPla' => 'render',
        'editModal' => 'lastID',
        'updatePlanificadas' => 'render',
        'ActiveButtonDeletePla' => 'ActiveButtonDelete',
        'cerrarModal'=> 'limpia',
        'listMiniTable' => 'lastID'


    ];

    public function limpia(){
        $this->id_informe = '';

    }

    public function render()
    {
        $this->sumarHoras();
        $informesPlanificadas = InformesPlanificadas::where('id_informe_planificadas', $this->id_informe)->get();
        return view('livewire.mini-table-planificadas',compact('informesPlanificadas'));
    }

    public function sumarHoras(){
        $test = DB::table('informes_planificadas')->where('id_informe_planificadas',$this->id_informe)->sum('horas_solas_planificas');
        $this->horas_total_planificadas = $test;
        $this->emit('sumarPla',$test);
    }

    public function lastID(Informe $informe){
        $this->id_informe = $informe->id;
    }


    public function deleteDescripcion($id){

        InformesPlanificadas::find($id)->delete();
          $this->render();
}

public function updateDescripcionPla(InformesPlanificadas $informesPlanificada ){

    $this->DisableButtonDelete();
    $this->emit('updateDescripcionPla', $informesPlanificada);
}


    public function DisableButtonDelete(){
        if($this->can_submit == true){
            $this->can_submit = false;
        }
    }
        public function ActiveButtonDelete(){
        if($this->can_submit == false){
        $this->can_submit = true;
        }
    }
}
