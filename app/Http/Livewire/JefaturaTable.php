<?php

namespace App\Http\Livewire;
use App\Models\Informe;
use App\Models\InformesRealizadas;
use App\Models\InformesPlanificadas;
use App\Models\User;
use Livewire\WithPagination;
use Auth;
use Livewire\Component;

class JefaturaTable extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = '5';
    public $camp = null;
    public $order = null;
    public $icon = '-circle';


    protected $queryString = [
        'search'=> ['except'=> ''],
        'camp' => ['except'=>null],
        'order' => ['except'=>null],
        'perPage' => ['except'=> '5'],
    ];


    protected $listeners = [
        'listRechazo' => 'render',
        'aprobarInforme'
    ];

    public function render()
    {
            $informes = Informe::termino($this->search)->where('estado','enviado_jefatura');


                            if($this->camp && $this->order){
                                if($this->camp === 'email'){
                                    $informes = $informes->orderBy(User::select('email')->whereColumn('users.id','informes.usuario_id',),$this->order);
                                }elseif($this->camp === 'name'){
                                    $informes = $informes->orderBy(User::select('name')->whereColumn('users.id','informes.usuario_id',),$this->order);
                                }elseif($this->camp === 'lastname'){
                                    $informes = $informes->orderBy(User::select('lastname')->whereColumn('users.id','informes.usuario_id',),$this->order);
                                }else{
                                    $informes = $informes->orderBy($this->camp,$this->order);
                                }

                              }else{
                                  $this->camp = null;
                                  $this->order = null;
                              }
                            $informes = $informes->paginate($this->perPage);
        return view('livewire.jefatura-table',compact('informes'));
    }

    public function aprobarInforme(Informe $informe){

        $informe->update([
            'id' => $informe->id,
            'estado' =>'enviado_recursos'
        ]);

        $this->render();
    }

    public function mount(){
        $this->icon = $this->iconDirection($this->order);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clear(){
        $this->search = '';
        $this->page = 1;
        $this->perPage = '5';
        $this->order =null;
        $this->camp =null;
        $this->icon = '-circle';
    }
    public function sortable($camp)
    {
        if($camp !== $this->camp){
            $this->order = null;
        }
        switch ($this->order) {
            case null:
                $this->order = 'asc';

                break;
            case 'asc':
                $this->order = 'desc';

                break;
            case 'desc':
                $this->order = null;

                break;
        }
        $this->icon =$this->iconDirection($this->order);
        $this->camp = $camp;
    }

    public function iconDirection($sort):string
    {
        if(!$sort){
            return '-circle';
        }
        return $sort === 'asc' ? '-arrow-circle-up' : '-arrow-circle-down';
    }
}
