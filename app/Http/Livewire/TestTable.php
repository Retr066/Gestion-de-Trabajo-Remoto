<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Area;
use Livewire\Component;
use Livewire\WithPagination;
class TestTable extends Component
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
        return view('livewire.test-table',[
            'users' => User::where('name','LIKE',"%{$this->search}%")
            ->orWhere('email','LIKE',"%{$this->search}%")
            ->paginate($this->perPage)
        ],);
    }
    public function clear(){
        $this->search = '';
        $this->page = 1;
        $this->perPage = '5';
    }
    public function destroy($id){
        User::find($id)->delete();
    }
}
