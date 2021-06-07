<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class LiveAddPermission extends Component
{

    public $showModal = 'hidden';
    public $action = '';
    public $permission_check = [];
    public $model;


    protected $listeners = [
        'deletePermission'=> 'render',
        'addPermission',

    ];

    public function render()
    {
        return view('livewire.live-add-permission');
    }

    public function hydrate(){
        $this->render();
    }

    public function addPermission($model_id, $model = null){
        $permissions = Permission::all();
        if(!$model){

        $role = Role::find($model_id);

        $this->model = $role;
        $havePermissions =$role->permissions()->get();
       foreach($permissions as $permission){
           if($havePermissions->contains($permission)){
               $this->permission_check[$permission->name]['check'] = true;
           }else{
            $this->permission_check[$permission->name]['check'] = false;
           }

           $this->permission_check[$permission->name]['id'] = $permission->id;
       }
    }else{
        $user = User::find($model_id);
        $this->model = $user;
         $havePermission =  $user->getPermissionsViaRoles();

        foreach($permissions as $p){
            if($user->hasPermissionTo($p)){
                $this->permission_check[$p->name]['check'] = true;
            }else{
             $this->permission_check[$p->name]['check'] = false;
            }
            $this->permission_check[$p->name]['id'] = $p->id;
            }


         }
        $this->showModal = '';
    }

    public function cerrarModal()
    {
        $this->showModal = 'hidden';
    }

    public function addPermissionKey($permission)
    {
        if(!$this->model->hasPermissionTo($permission)){
            $this->model->givePermissionTo($permission);
        }else{
            $this->model->revokePermissionTo($permission);
        }
        $this->emit('updateListRoles');
    }
}
