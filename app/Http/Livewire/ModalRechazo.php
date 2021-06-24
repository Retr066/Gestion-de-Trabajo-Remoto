<?php

namespace App\Http\Livewire;
use App\Models\Informe;
use Livewire\Component;

class ModalRechazo extends Component
{
    public $action = '';
    public $showModal = 'hidden';
    public $nombreModal = '';
    public $method = '';
    public $respuesta = '';
    public $id_informe = '';

    protected $listeners = [
        'rechazarInforme' => 'editRechazo',
    ];

    protected function rules()
    {
        return [
        'respuesta' => 'required|string|min:5|max:300',
        ];
    }

    protected $validationAttributes = [
        'respuesta' => 'Movito',
    ];

    public function render()
    {
        return view('livewire.modal-rechazo');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function sacarModalNuevo()
    {

        $this->nombreModal = 'Motivo de Rechazo';
        $this->action = 'Registrar';
        $this->method = 'saveRechazo';
        $this->showModal = '';

    }
    public function editRechazo(Informe $informe){
        $this->sacarModalNuevo();
        $this->id_informe = $informe->id;

    }

    public function saveRechazo(){
        $this->validate();
        $informe = Informe::find($this->id_informe);
        $informe->update([
            'id' => $informe->id,
            'respuesta' => $this->respuesta,
            'estado' => 'rechazado_jefatura',
        ]);

        $this->cerrarModal();
        $this->emit('listRechazo');
    }

    public function cerrarModal(){
        $this->reset(['showModal']);
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
