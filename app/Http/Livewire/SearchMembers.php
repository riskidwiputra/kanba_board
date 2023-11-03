<?php

namespace App\Http\Livewire;

use App\Models\Board;
use App\Models\User;
use Livewire\Component;

class SearchMembers extends Component
{
    public $search = '';
    public $idBoard,$response ;
    public $members = [];
    public $selectedMembers = [];

    protected $listeners = [
        'saveShareMember' => 'saveShareMember',
        'addMember' => '$refresh',
     
    ];

    public function saveShareMember($idBoard, $idMember){

        $board = Board::find($idBoard);

        $board->collaborators()->attach($idMember);

        if($board){
            $this->response = "success";
        }else{
            $this->response = "failed";
        };

        $this->emit('addMember', $this->response);

    }

    public function render()
    {
       
        $users = User::where('name', 'like', '%' . $this->search . '%')->get();

        $this->members = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
            ];
        })->toArray();
      
        return view('livewire.search-members');
    }
}
