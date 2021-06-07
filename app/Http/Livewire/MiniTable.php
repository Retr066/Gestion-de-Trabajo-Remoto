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
    public $id_informe = '';

    protected $listeners = [
        'saveDescripcion' => 'render',
        'editModal' => 'buscar'

    ];

    public function render()
    {
        $test = DB::table('informes_realizadas')->sum('horas_solas_realizadas');
        $this->horas_total_realizadas = $test;

        $informesPlanificadas = InformesPlanificadas::all();
        $informesRealizadas = InformesRealizadas::all();
        return view('livewire.mini-table',[
            'informesPlanificadas'=> $informesPlanificadas,
            'informesRealizadas' => $informesRealizadas,
        ]);
    }

    public function deleteDescripcion($id){

        InformesRealizadas::find($id)->delete();
          $this->render();
          $test = DB::table('informes_realizadas')->sum('horas_solas_realizadas');
        $this->horas_total_planificadas = $test;
}

public function buscar(Informe $informe){
    $this->id_informe = $informe->id;

}

}
