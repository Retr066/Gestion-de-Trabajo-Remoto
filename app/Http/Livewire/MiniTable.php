<?php

namespace App\Http\Livewire;
use App\Models\InformesPlanificadas;
use App\Models\InformesRealizadas;
use Livewire\Component;
use Auth;
use App\Models\Informe;
use Illuminate\Support\Facades\DB;
class MiniTable extends Component
{

    public $horas_total_realizadas = '';

    public $id_informe = ''; //el id del informe
    public $can_submit = 'true';
    protected $listeners = [
        'saveDescripcion' => 'render',
        'editModal' => 'mount',
        'updateRealizadas' => 'render',
        'ActiveButtonDelete',
        'cerrarModal'=> 'limpia'


    ];

    public function limpia(){
        $this->id_informe = '';

    }

    public function render()
    {
        $test = DB::table('informes_realizadas')->where('id_informe_realizadas',$this->id_informe)->sum('horas_solas_realizadas');
        $this->horas_total_realizadas = $test;


        $informesPlanificadas = InformesPlanificadas::where('id_informe_planificadas', $this->id_informe)->get();
        $informesRealizadas = InformesRealizadas::where('id_informe_realizadas',$this->id_informe)->get();
        return view('livewire.mini-table',[
            'informesPlanificadas'=> $informesPlanificadas,
            'informesRealizadas' => $informesRealizadas,
        ]);
    }

    public function mount(Informe $informe){
        $this->id_informe = $informe->id;
    }

    public function deleteDescripcion($id){

        InformesRealizadas::find($id)->delete();
          $this->render();
          $test = DB::table('informes_realizadas')->sum('horas_solas_realizadas');
        $this->horas_total_planificadas = $test;
}

public function updateDescripcion(InformesRealizadas $informesRealizada ){

    $this->DisableButtonDelete();
    $this->emit('updateDescripcion', $informesRealizada);
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
