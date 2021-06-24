<?php

namespace App\Http\Livewire;
use App\Models\Informe;
use App\Models\InformesRealizadas;
use App\Models\InformesPlanificadas;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Auth;
use PDF;

class InformeTable extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = '5';
    public $camp = null;
    public $order = null;
    public $icon = '-circle';
    public $informe_estado = '';


    protected $queryString = [
        'search'=> ['except'=> ''],
        'camp' => ['except'=>null],
        'order' => ['except'=>null],
        'perPage' => ['except'=> '5'],
        'informe_estado'=>['except'=> ''],
    ];

    protected $listeners = [
        'informeList' => 'render',
        'deleteInformeList' => 'deleteInforme',
        'enviarInforme',


    ];

    public function render()
    {

        $informes = Informe::where('usuario_id',auth()->user()->id)
                    ->whereIn('estado',['generado','enviado_recursos','enviado_jefatura'])
                            ->where(function ($query){
                                $query->orWhere('created_at','LIKE','%'. $this->search.'%')
                                ->orWhere('id','LIKE','%'. $this->search.'%')
                                ->orWhere('estado','LIKE','%'. $this->search.'%')
                                ->orWhere('updated_at','LIKE','%'. $this->search.'%')->estados($this->informe_estado);
                            });

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








    public function deleteInforme(Informe $informe){

        $informe->delete();
          $this->emit('deleteInforme', $informe);
    }



    public function enviarInforme(Informe $informe){
        $informe->update([
            'id' => $informe->id,
            'estado' => 'enviado_jefatura'
        ]);
        $this->emit('listEnviar',$informe);
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
   public function GenerarPdf($id){
    $user_id = auth()->user()->id;
      $user = User::find($user_id);
    $informes = Informe::find($id);
    $informesRealizadas = InformesRealizadas::where('id_informe_realizadas', $id)->get();
    $informesPlanificadas = InformesPlanificadas::where('id_informe_planificadas', $id)->get();
    $pdf = PDF::loadView('docente.pdf',compact('informesRealizadas','informes','user','informesPlanificadas'));
      return  $pdf->stream('reporteInforme.'.date('y-m-d').'.pdf');
   }
}
