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
    public $id_planificas ; //el id del la mini tabla de PLanificadas

    public $id_informe;
    public $count = 1 ;
    public $fecha_inicio_realizadas = '';
    public $fecha_fin_realizadas = '';
    public $fecha_inicio_planificadas = '' ;
    public $fecha_fin_planificadas = '';
    public $tituloModal ='';

    public $nombre_rubro_realizadas = '';
    public $descripcion_rubro_realizadas = '';
    public $horas_solas_realizadas = '' ;

    public $horas_total_realizadas = '';
    public $horas_total_planificadas = '';


    public $nombre_rubro_planificadas = '';
    public $descripcion_rubro_planificadas = '';
    public $horas_solas_planificas = '';

    public $open = false;
    public $hidden = '';
    public $hidden2 = 'hidden';
    public $hidden3 = '';
    public $hidden4 = 'hidden';

    protected $listeners = [
        'abrirModal',
        'editModal' => 'DatosInforme',
        'updateDescripcion',
        'updateDescripcionPla',
        'limpia'=> 'cerrarModal',
        'sumar',
        'sumarPla',
    ];


    protected function rules()
    {
        return [
        'fecha_inicio_realizadas' => 'required|date',
        'fecha_fin_realizadas' => 'required|date|after:fecha_inicio_realizadas',
        'fecha_inicio_planificadas' => 'required|date',
        'fecha_fin_planificadas' => "required|date|after:fecha_inicio_planificadas",
        ];
    }

    protected $validationAttributes = [
        'fecha_inicio_realizadas' => 'Fecha Inicio',
        'fecha_fin_realizadas' => 'Fecha Fin',
        'fecha_inicio_planificadas' => 'Fecha Inicio',
        'fecha_fin_planificadas' => 'Fecha Fin',
        'nombre_rubro_realizadas' => 'Rubro',
        'descripcion_rubro_realizadas' => 'Descripcion',
        'horas_solas_realizadas'=> 'Horas',
        'nombre_rubro_planificadas' => 'Rubro',
        'descripcion_rubro_planificadas' => 'Descripcion',
        'horas_solas_planificas' => 'Horas',


    ];

    public function updated($propertyName)
    {
        $tipos = Rubro::pluck('nombre_rubro');
        $tipos = $tipos->join(',');

        $this->validateOnly($propertyName,[
            'nombre_rubro_realizadas' => "required|in:{$tipos}",
            'descripcion_rubro_realizadas' => 'required|string|min:3|max:300',
            'horas_solas_realizadas' => 'required|integer|min:1|max:10',
            'fecha_inicio_realizadas' => 'required|date',
            'fecha_fin_realizadas' => 'required|date|after:fecha_inicio_realizadas',
            'fecha_inicio_planificadas' => 'required|date',
            'fecha_fin_planificadas' => "required|date|after:fecha_inicio_planificadas",
            'nombre_rubro_planificadas' => "required|in:{$tipos}",
            'descripcion_rubro_planificadas' => 'required|string|min:3|max:300',
            'horas_solas_planificas' => 'required|integer|min:1|max:10'

        ]);
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
    public function mount(){
        $this->count = 1;
    }
    public function validador(){
        $this->validate([
            'fecha_inicio_realizadas' => 'required|date',
            'fecha_fin_realizadas' => 'required|date|after:fecha_inicio_realizadas',
        ]);

        $this->count++;
    }

    public function DatosInforme(Informe $informe){
        $this->editModal();
        $this->id_informe = $informe->id;
        $this->fecha_inicio_realizadas = $informe->fecha_inicio_realizadas;
        $this->fecha_fin_realizadas = $informe->fecha_fin_realizadas;
        $this->fecha_inicio_planificadas = $informe->fecha_inicio_planificadas;
        $this->fecha_fin_planificadas = $informe->fecha_fin_planificadas;
    }


    public function save(){
        $this->validate();
        $id_informe = Informe::find($this->id_informe);
        $id_informe->update([
            'id' => $this->id_informe,
            'usuario_id' => Auth::user()->id,
            'fecha_inicio_realizadas' => $this->fecha_inicio_realizadas,
            'fecha_fin_realizadas' => $this->fecha_fin_realizadas,
            'fecha_inicio_planificadas'=>$this->fecha_inicio_planificadas,
            'fecha_fin_planificadas' =>$this->fecha_fin_planificadas,
            'horas_total_realizadas' =>$this->horas_total_realizadas,
            'horas_total_planificadas' => $this->horas_total_planificadas,


        ]);

        $this->cerrarModal();
        $this->emit('informeList');
    }
    public function saveDescripcion(){

        $tipos = Rubro::pluck('nombre_rubro');
        $tipos = $tipos->join(',');
        $this->validate([
            'nombre_rubro_realizadas' => "required|in:{$tipos}",
            'descripcion_rubro_realizadas' => 'required|string|min:3|max:300',
            'horas_solas_realizadas' => 'required|integer|min:1|max:10'
        ]);

        InformesRealizadas::create([
            'id_informe_realizadas' => $this->id_informe,
            'nombre_rubro_realizadas' => $this->nombre_rubro_realizadas,
            'descripcion_rubro_realizadas' => $this->descripcion_rubro_realizadas,
            'horas_solas_realizadas'=>$this->horas_solas_realizadas,
        ]);



        $this->reset(['nombre_rubro_realizadas','descripcion_rubro_realizadas','horas_solas_realizadas']);
         $this->emit('saveDescripcion');

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
        $tipos = Rubro::pluck('nombre_rubro');
        $tipos = $tipos->join(',');
        $this->validate([
            'nombre_rubro_realizadas' => "required|in:{$tipos}",
            'descripcion_rubro_realizadas' => 'required|string|min:3|max:300',
            'horas_solas_realizadas' => 'required|integer|min:1|max:10'
        ]);
        $license = InformesRealizadas::find($this->id_realizas);
        $license->update([

            'nombre_rubro_realizadas' => $this->nombre_rubro_realizadas ,
            'descripcion_rubro_realizadas'    => $this->descripcion_rubro_realizadas   ,
            'horas_solas_realizadas' => $this->horas_solas_realizadas,

        ]);

        $this->reset(['nombre_rubro_realizadas','descripcion_rubro_realizadas','horas_solas_realizadas']);
        $this->resetErrorBag();
        $this->resetValidation();
        $this->hidden = '';
        $this->hidden2 = 'hidden';
        $this->ActiveButtonDelete();
        $this->emit('updateRealizadas');


    }

    public function abrirModal()
    {

        $this->tituloModal = 'Nuevo Informe';
        $this->open = true;
        Informe::create([
            'usuario_id' => Auth::user()->id,
            'estado' => 'generado',
        ]);

        $id_informe = Informe::all();
        $id_informe = $id_informe->last()->id;
        $this->id_informe = $id_informe;
        $this->emit('informeList');
        $this->emit('listMiniTable',$id_informe);

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

    public function sumar($test){
        $this->horas_total_realizadas = $test;
    }
    public function sumarPla($test){
        $this->horas_total_planificadas = $test;
    }


    ////para planificadas

    public function saveDescripcionPlanificadas(){

        $tipos = Rubro::pluck('nombre_rubro');
        $tipos = $tipos->join(',');
        $this->validate([
            'nombre_rubro_planificadas' => "required|in:{$tipos}",
            'descripcion_rubro_planificadas' => 'required|string|min:3|max:300',
            'horas_solas_planificas' => 'required|integer|min:1|max:10'
        ]);

        InformesPlanificadas::create([
            'id_informe_planificadas' => $this->id_informe,
            'nombre_rubro_planificadas' => $this->nombre_rubro_planificadas,
            'descripcion_rubro_planificadas' => $this->descripcion_rubro_planificadas,
            'horas_solas_planificas' =>$this->horas_solas_planificas,
        ]);

        $this->reset(['nombre_rubro_planificadas','descripcion_rubro_planificadas','horas_solas_planificas']);
        $this->resetErrorBag();
        $this->resetValidation();
        $this->emit('saveDescripcionPla');

    }


    public function updateDescripcionPla(InformesPlanificadas $informesPlanificada){
        $this->id_planificas = $informesPlanificada->id;
        $this->nombre_rubro_planificadas = $informesPlanificada->nombre_rubro_planificadas;
        $this->descripcion_rubro_planificadas = $informesPlanificada->descripcion_rubro_planificadas;
        $this->horas_solas_planificas = $informesPlanificada->horas_solas_planificas;
        $this->hidden3 = 'hidden';
        $this->hidden4 = '';

    }



    public function updatePlanificadas(){
        $tipos = Rubro::pluck('nombre_rubro');
        $tipos = $tipos->join(',');
        $this->validate([
            'nombre_rubro_planificadas' => "required|in:{$tipos}",
            'descripcion_rubro_planificadas' => 'required|string|min:3|max:300',
            'horas_solas_planificas' => 'required|integer|min:1|max:10'
        ]);
        $license = InformesPlanificadas::find($this->id_planificas);

        $license->update([

            'nombre_rubro_planificadas' => $this->nombre_rubro_planificadas ,
            'descripcion_rubro_planificadas'    => $this->descripcion_rubro_planificadas   ,
            'horas_solas_planificas' => $this->horas_solas_planificas,

        ]);

        $this->reset(['nombre_rubro_planificadas','descripcion_rubro_planificadas','horas_solas_planificas']);
        $this->resetErrorBag();
        $this->resetValidation();

        $this->hidden3 = '';
        $this->hidden4 = 'hidden';
        $this->emit('ActiveButtonDeletePla');
        $this->emit('updatePlanificadas');


    }
}
