<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use App\Models\Informe;
use App\Models\InformesRealizadas;
use App\Models\InformesPlanificadas;
class Comparar extends Component
{
    public $buscar = "";
    public $usuarios = [];
    public $picked = false;
    public $id_user = null;
    public $informe_realizado;
    public $informe_planificado;
    public $data_realizado = [];
    public $data_planificado = [];
    public $user = [];
    public $nombre;
    public $nombre2;
    public $horas_planificadas;
    public $horas_realizas;
    public $fecha_envio_realizada;
    public $fecha_envio_planificada;
    public function mount(){
        $this->buscar = "";
        $this->usuarios = [];
        $this->picked = false;
    }

    protected function rules()
    {
        return [
        'informe_realizado' => 'required',
        'informe_planificado' => 'required',
        ];
    }



    public function updatedBuscar(){
        $this->picked = false;
        $this->validate([
            'buscar' =>"required|min:2"
        ]);

        $this->usuarios = User::where('name','like',trim($this->buscar).'%')
        ->orWhere('lastname','like',trim($this->buscar).'%')
        ->take(3)
        ->get();
    }

    public function asignarUsuario($nombre ,$id){
        $this->id_user = $id;
        $this->buscar = $nombre;
        $this->picked = true;
    }

    public function asignarPrimero(){
        $usuario = User::where('name','like',trim($this->buscar).'%')
        ->orWhere('lastname','like',trim($this->buscar).'%')
        ->first();

        if($usuario){
            $this->buscar = $usuario->name;
        }else{
            $this->buscar = "...";
        }
        $this->picked = true;
    }
    public function restablecer(){
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();
    }

    public function getInformesProperty(){
        $informes = Informe::where('usuario_id',$this->id_user)
        ->where('estado','enviado_jefatura')
        ->get();
       return $informes;
    }

    public function generarComparacion(){
        $this->validate();
        $actividades_realizadas = InformesRealizadas::where('id_informe_realizadas',$this->informe_realizado)->get();
        $actividades_planificadas = InformesPlanificadas::where('id_informe_planificadas',$this->informe_planificado)->get();
        $informe = Informe::where('id' , $this->informe_realizado)->first();
        $informe2 = Informe::where('id' , $this->informe_planificado)->first();

        $this->horas_realizas = $informe->horas_total_realizadas;
        $this->horas_planificadas = $informe2->horas_total_planificadas;
        $this->fecha_envio_realizada = $informe->updated_at;
        $this->fecha_envio_planificada = $informe2->updated_at;
        $user = User::where('id',$this->id_user)->get();
        $this->nombre = 'Actividades Realizadas';
        $this->nombre2 = 'Actividades Planificadas';
        $this->user = $user;
        $this->data_realizado = $actividades_realizadas;
        $this->data_planificado = $actividades_planificadas;
    }
    public function render()
    {
        return view('livewire.comparar');
    }
}
