<?php

namespace App\Http\Livewire;
use App\Models\Informe;
use App\Models\User;
use Livewire\Component;
use App\Models\Rubro;
use App\Models\InformesRealizadas;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
class Reportesdocente extends Component
{
    public $informes_generados;
    public $horas_trabajadas;
    public $dias_habiles;
    public $horas_mes_habil;
    public $docente;
    public $Idusuario;



    public function render()
    {
        return view('livewire.reportesdocente');
    }

    public function mount()
    {
        $this->Idusuario = auth()->user()->id;
        $this->datosCartas();

    }

    public function datosCartas(){
        $datos = Informe::where('usuario_id',$this->Idusuario)->get();
        $contador= 0;
        $horas_trabajadas = 0;
        $mes = 300;
        foreach($datos as $data){
            $contador++;
            $horas_trabajadas += $data->horas_total_realizadas ;
        }
        $this->informes_generados = $contador;
        $this->horas_trabajadas = $horas_trabajadas;
        $this->dias_habiles =  $horas_trabajadas / 8;
        $this->horas_mes_habil = ($horas_trabajadas * 100) / $mes;

    }

    public function datosGraficos(){

        $datos2 = DB::select('select nombre_rubro_realizadas, SUM(horas_solas_realizadas) AS HorasTotales FROM informes INNER join informes_realizadas on informes.id=informes_realizadas.id_informe_realizadas WHERE informes.usuario_id = ? GROUP BY nombre_rubro_realizadas',[$this->Idusuario]);
        $datos3 = DB::select('select nombre_rubro_planificadas, SUM(horas_solas_planificas) AS HorasTotalesPla FROM informes INNER join informes_planificadas on informes.id=informes_planificadas.id_informe_planificadas WHERE informes.usuario_id = ? GROUP BY nombre_rubro_planificadas',[$this->Idusuario]);
        if($datos2 == [] ){
            return;
        }else{
            $this->emit('DatosGraficos2',$datos2);

        }

        if($datos3 == [] ){
            return;
        }else{

            $this->emit('DatosGraficos3',$datos3);
        }


    }


}
