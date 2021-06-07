<?php

namespace App\Http\Livewire;

use App\Models\Rubro;
use Livewire\Component;
use App\Http\Requests\RequestUpdateRubro;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Storage;


class Modalrubro extends Component
{
    use WithFileUploads;
    public $showModal = 'hidden';
    public $name = '';
    public $rubro = null;
    public $action = '';
    public $method = '';
    public $nombreModal = '';


    protected $listeners = [
        'showModal' => 'sacarModal',
        'showModalNewRubro' => 'sacarModalNuevo'
    ];

    public function render()
    {
        return view('livewire.modalrubro');
    }

       public function sacarModal(Rubro $rubro)
       {
            $this->rubro = $rubro;
            $this->name = $rubro->nombre_rubro;
            $this->nombreModal = 'Editar Rubro';
            $this->action = 'Actualizar';
            $this->method = 'actualizarRubro';
            $this->showModal = '';
       }

       public function cerrarModal(){

        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();
    }

    public function sacarModalNuevo(){

        $this->rubro = null;
        $this->action = 'Registrar';
        $this->method = 'registrarRubro';
        $this->nombreModal = 'Registrar Rubro';
        $this->showModal = '';
    }

    public function actualizarRubro()
    {
        $requestRubro = new RequestUpdateRubro();
        $values =  $this->validate($requestRubro->rules($this->rubro),$requestRubro->messages());

    $this->rubro->update($values);
       $this->emit('rubroListUpdate');
       $this->resetErrorBag();
       $this->resetValidation();
       $this->reset();
    }



    public function updated($label)
    {
        $requestRubro = new RequestUpdateRubro();
        $this->validateOnly($label,$requestRubro->rules($this->rubro),$requestRubro->messages());
    }

    public function registrarRubro()
    {
        $requestRubro = new RequestUpdateRubro();
        $values =  $this->validate($requestRubro->rules($this->rubro),
        $requestRubro->messages());

        $rubro = new Rubro;
        $rubro->fill($values);
        DB::transaction(function() use ($rubro){
            $rubro->save();
        });
        $this->emit('rubroListUpdate');
        $this->cerrarModal();
    }



}
