<?php

namespace App\Http\Livewire;

use App\Models\Rubro;
use Livewire\Component;
use Livewire\WithPagination;

class RubroTable extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = '5';
    public $camp = null;
    public $order = null;
    public $icon = '-circle';
    public $showModal = 'hidden';

    protected $queryString = [
        'search'=> ['except'=> ''],
        'camp' => ['except'=>null],
        'order' => ['except'=>null],
        'perPage' => ['except'=> '5'],
    ];

    protected $listeners = [

        'rubroListUpdate' => 'render',
        'deleteRubroList' => 'deleteRubro'
    ];

    public function render()
    {
        $rubros = Rubro::termino($this->search);


        if ($this->camp && $this->order) {
            $rubros = $rubros->orderBy($this->camp, $this->order);
        } else {
            $this->camp = null;
            $this->order = null;
        }

        $rubros = $rubros->paginate($this->perPage);

        return view('livewire.rubro-table', [
               'rubros' =>  $rubros
        ]);
    }

    public function clear(){
        $this->reset();

    }

    public function deleteRubro(Rubro $rubro){

        $rubro->delete();
          $this->emit('deleteRubro', $rubro);
}

public function updatingSearch()
{
    $this->resetPage();
}

    public function mount()
    {
            $this->icon = $this->iconDirection($this->order);
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


    public function iconDirection($sort): string
    {
        if (!$sort) {
            return '-circle';

        }

        return $sort === 'asc' ? '-arrow-circle-up' : '-arrow-circle-down';
    }

    public function showModal(Rubro $rubro){

        if($rubro->nombre_rubro){
            $this->emit('showModal',$rubro);
          } else {
              $this->emit('showModalNewRubro');
          }
    }
}
