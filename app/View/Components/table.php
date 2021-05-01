<?php

namespace App\View\Components;
use App\Models\User;
use Illuminate\View\Component;
use Livewire\WithPagination;
class table extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    use WithPagination;
    public $search = 'jorge';
    public function render()
    {
        return view('components.table',[
            'users' => User::paginate(2)
        ]);
    }
}
