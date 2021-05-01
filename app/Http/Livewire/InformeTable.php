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
    protected $queryString = [
        'search'=> ['except'=> ''],
        'perPage' => ['except'=> '5']
    ];

    public function render()
    {
        $informes = Informe::where('usuario_id','LIKE','%'. $this->search.'%')
                            ->orwhere('nombres','LIKE','%'. $this->search.'%')
                            ->orwhere('nombre_area_informe','LIKE','%'. $this->search.'%')
                            ->orwhere('fecha_inicio_realizadas','LIKE','%'. $this->search.'%')
                            ->orwhere('fecha_fin_realizadas','LIKE','%'. $this->search.'%')
                            ->orwhere('horas_total_realizadas','LIKE','%'. $this->search.'%')
                            ->paginate($this->perPage);

        return view('livewire.informe-table',compact('informes'));
    }

    public function destroy($id){
        Informe::find($id)->delete();

    }

    public function clear(){
        $this->search = '';
        $this->page = 1;
        $this->perPage = '5';
    }
}
