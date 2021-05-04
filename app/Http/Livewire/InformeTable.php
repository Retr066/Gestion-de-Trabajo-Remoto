<?php

namespace App\Http\Livewire;
use App\Models\Informe;
use Livewire\Component;
use Livewire\WithPagination;
class InformeTable extends Component
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
        'perPage' => ['except'=> '5']
    ];

    public function render()
    {
        $informes = Informe::where('usuario_id','LIKE','%'. $this->search.'%')
                            ->orwhere('nombres','LIKE','%'. $this->search.'%')
                            ->orwhere('nombre_area_informe','LIKE','%'. $this->search.'%')
                            ->orwhere('fecha_inicio_realizadas','LIKE','%'. $this->search.'%')
                            ->orwhere('fecha_fin_realizadas','LIKE','%'. $this->search.'%')
                            ->orwhere('horas_total_realizadas','LIKE','%'. $this->search.'%');

                            if($this->camp && $this->order){
                                $informes = $informes->orderBy($this->camp,$this->order);
                              }else{
                                  $this->camp = null;
                                  $this->order = null;
                              }
                            $informes = $informes->paginate($this->perPage);

        return view('livewire.informe-table',[
            'informes' => $informes,
        ]);
    }

    public function destroy($id){
        Informe::find($id)->delete();

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
