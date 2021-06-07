<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Area;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
class TestTable extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = '5';
    public $user_role = '';
    public $camp = null;
    public $order = null;
    public $icon = '-circle';
    public $showModal = 'hidden';
    public $roles;

    protected $queryString = [
        'search'=> ['except'=> ''],
        'camp' => ['except'=>null],
        'order' => ['except'=>null],
        'perPage' => ['except'=> '5'],
        'user_role'=> ['except'=> ''],
    ];
    protected $listeners = [
        'userListUpdate' => 'render',
        'destroyList'=> 'destroy',
    ];

    public function render()

    {

        $users = User::termino($this->search)
        ->when($this->user_role != '',function($query){
             return $query->role($this->user_role);
        });




            if($this->camp && $this->order){
                if($this->camp === 'nombre_area'){
                    $users = $users->orderBy(Area::select('nombre_area')->whereColumn('areas.user_id','users.id'),$this->order);
                }else{
                    $users = $users->orderBy($this->camp,$this->order);
                }

              }else{
                  $this->camp = null;
                  $this->order = null;
              }
            $users = $users->paginate($this->perPage);

        return view('livewire.test-table',[
            'users' => $users,
        ],);
    }
    public function clear(){
        $this->reset();
    }
    public function destroy(User $user){
       /*  User::find($id)->delete(); */
       can('usuario delete');
       $user->r_area()->delete();
       $user->delete();
       $this->emit('destroy',$user);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function mount(){
        $this->icon = $this->iconDirection($this->order);
        $this->roles = Role::pluck('name','name')->toArray();
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

    public function showModal(User $user){
        if($user->name){
            can('usuario update');
          $this->emit('showModal',$user);
        } else {
            can('usuario create');
            $this->emit('showModalNewUser');
        }
    }

    public function showImage(User $user){
        if($user->name){
          $this->emit('showImage',$user);
        } else {
           return;
        }
    }
}
