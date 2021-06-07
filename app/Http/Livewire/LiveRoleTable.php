<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class LiveRoleTable extends Component
{

    protected $listeners = [
        'updateListRoles' => 'render',
    ];

    public function render()
    {
        $roles = Role::all();

        $roles = $roles->each(function($role){
            $role->count_user = User::role($role->name)->count();
        });
        $permissions = permission::all();
        $permissions = $permissions->each(function($p){
            $p->count_user = User::permission($p->name)->count();
        });

        return view('livewire.live-role-table',compact('roles','permissions'));
    }

    public function deleteRole(Role $role) {
        $role->delete();
        $this->render();
    }

public function deletePermission(Permission $role) {
    $role->delete();
    $this->render();
    $this->emit('deletePermission');

}

}
