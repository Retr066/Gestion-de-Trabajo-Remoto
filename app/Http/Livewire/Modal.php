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
    public $id_realizas ; //el id del la mini tabla de realizadas
    public $id_informe;
    public $fecha_inicio_realizadas = '';
    public $fecha_fin_realizadas = '';
    public $fecha_inicio_planificadas = '' ;
    public $fecha_fin_planificadas = '';
    public $tituloModal ='';
    public $nombre_rubro_realizadas = '';
    public $descripcion_rubro_realizadas = '';
    public $horas_solas_realizadas = '' ;

    public $open = false;
    public $hidden = '';
    public $hidden2 = 'hidden';

    protected $listeners = [
        'abrirModal',
        'editModal' => 'DatosInforme',
        'updateDescripcion',
        'limpia'=> 'cerrarModal',
    ];

    public function DatosInforme(Informe $informe){
        $this->editModal();
        $this->id_informe = $informe->id;
        $this->fecha_inicio_realizadas = $informe->fecha_inicio_realizadas;
        $this->fecha_fin_realizadas = $informe->fecha_fin_realizadas;
        $this->fecha_inicio_planificadas = $informe->fecha_inicio_planificadas;
        $this->fecha_fin_planificadas = $informe->fecha_fin_planificadas;
    }


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


        $informesPlanificadas = InformesPlanificadas::where('id_informe_planificadas', $this->id_informe)->get();
        $informesRealizadas = InformesRealizadas::where('id_informe_realizadas',$this->id_informe)->get();

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

    public function updateDescripcion(InformesRealizadas $informesRealizada){
        $this->id_realizas = $informesRealizada->id;
        $this->nombre_rubro_realizadas = $informesRealizada->nombre_rubro_realizadas;
        $this->descripcion_rubro_realizadas = $informesRealizada->descripcion_rubro_realizadas;
        $this->horas_solas_realizadas = $informesRealizada->horas_solas_realizadas;
        $this->hidden = 'hidden';
        $this->hidden2 = '';

    }

    public function updateRealizadas(){
        /* $this->validate(); */
        $license = InformesRealizadas::find($this->id_realizas);

        $license->update([

            'nombre_rubro_realizadas' => $this->nombre_rubro_realizadas ,
            'descripcion_rubro_realizadas'    => $this->descripcion_rubro_realizadas   ,
            'horas_solas_realizadas' => $this->horas_solas_realizadas,

        ]);

        $this->reset(['nombre_rubro_realizadas','descripcion_rubro_realizadas','horas_solas_realizadas']);
        /* $this->resetErrorBag();
        $this->resetValidation();
         */
        $this->hidden = '';
        $this->hidden2 = 'hidden';
        $this->ActiveButtonDelete();
        $this->emit('updateRealizadas');


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
        $this->hidden2 = 'hidden';

    }

    public function cerrarModal()
    {

        $this->open = false;
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();
        $this->emit('cerrarModal');

    }

    public function ActiveButtonDelete()
    {

        $this->emit('ActiveButtonDelete');
    }
}
