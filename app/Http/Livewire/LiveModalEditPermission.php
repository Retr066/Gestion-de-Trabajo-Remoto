<?php

namespace App\Http\Livewire;
use App\Http\Requests\RequestUpdateRole;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Http\Requests\RequestCreateRole;
class LiveModalEditPermission extends Component
{
    public $role;
    public $showModal = false;
    public $dataShow;
    public $target;
    public $button ='';
    public $title = '';
    public $actionTarget;

    protected $listeners = [
        'toogleModal',

    ];

    public function render()
    {
        return view('livewire.live-modal-edit-permission');
    }

    public function toogleModal($model_id = null,$model = null){
        $this->resetErrorBag();
        $this->resetValidation();
        $this->role = '';
        if($model_id &&  $model){
            $this->target = $model == 'Role' ? Role::find($model_id) : '';
            $this->role = $this->target->name;
            $this->title = 'Edicion de rol';
            $this->button = 'Actualizar';
            $this->actionTarget = 'updateTarget';
        } else{
            $this->title = 'Crear nuevo rol';
             $this->button = 'Registrar';
             $this->actionTarget = 'createTarget';
        }

        $this->showModal = $this->showModal ? false : true;
    }

    public function updateTarget(){
        $request = new RequestUpdateRole;
        $values = $this->validate($request->rules(),$request->messages());
        $this->target->update([
            'name' => $values['role']
        ]);
        $this->reset();
        $this->emit('updateListRoles');

    }

    public function createTarget(){
        $request = new RequestCreateRole();
        $values = $this->validate($request->rules(),$request->messages());

        Role::create(['guard_name' => 'web','name'=> $values['role']]);
        $this->reset();
        $this->emit('updateListRoles');
    }
 }
