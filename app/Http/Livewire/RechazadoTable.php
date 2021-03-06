<?php

namespace App\Http\Livewire;
use App\Models\Informe;
use App\Models\InformesRealizadas;
use App\Models\InformesPlanificadas;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Auth;

class RechazadoTable extends Component
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
        'informeList' => 'render',
        'deleteInformeList' => 'deleteInforme',
        'enviarInforme'

    ];

    public function render()
    {
        $informes = Informe::where('usuario_id',auth()->user()->id)
        ->where('estado','rechazado_jefatura')

                ->where(function ($query){
                    $query->orWhere('updated_at','LIKE','%'. $this->search.'%')
                    ->orWhere('id','LIKE','%'. $this->search.'%')
                    ->orWhere('estado','LIKE','%'. $this->search.'%')
                    ->orWhere('respuesta','LIKE','%'. $this->search.'%');
                });

                if($this->camp && $this->order){
                    $informes = $informes->orderBy($this->camp,$this->order);
                  }else{
                      $this->camp = null;
                      $this->order = null;
                  }
                $informes = $informes->paginate($this->perPage);

        return view('livewire.rechazado-table',compact('informes'));
    }


    public function enviarInforme(Informe $informe){
        $informe->update([
            'id' => $informe->id,
            'estado' => 'enviado_jefatura'
        ]);
        $this->emit('listEnviar',$informe);
    }

    public function deleteInforme(Informe $informe){

        $informe->delete();
          $this->emit('deleteInforme', $informe);
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
