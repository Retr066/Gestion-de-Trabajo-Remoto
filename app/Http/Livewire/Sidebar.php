<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
class Sidebar extends Component
{



    protected $listeners = [
        'userListUpdate' => 'render',

    ];
    public function render()
    {

        /* $roles = Role::pluck('name');
        $roles = $roles->join(,); */


        $rol_user = auth()->user()->getRoleNames();

        return view('livewire.sidebar',compact('rol_user'));
    }



}
