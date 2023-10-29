<?php

namespace App\Http\Livewire;

use App\Models\Board;
use App\Models\Lists;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BoardComponent extends Component
{
    public $board_title,$response,$user;
  
    protected $listeners = [
        'createBoard' => '$refresh',
    ];
    
    public function mount()
    {
        $this->user = Auth::user();
    }

    public function resetFields(){
        $this->board_title = '';
    }
    
    public function insertBoard(){
 
        $this->validate([
            'board_title'   => 'required',
        ]);

        $post = Board::create([
            'title'     => $this->board_title,
            'id_user'   => $this->user->id
        ]);

        Lists::create([
            'name'          => "Backlog",
            'description'   => 'A backlog is an organized list of features, ideas, tasks, updates, bug fixes, user stories, and sprints that need to be addressed/ completed up to a certain deadline',
            'id_board'      => $post->id,
            'created_by'    => $this->user->id
        ]);

        Lists::create([
            'name'          => "In Progress",
            'description'   => 'indicates that a task, project, or activity is in progress or is being worked on at the moment. This term is used in various contexts, especially in project management, task management, and work management',
            'id_board'      => $post->id,
            'created_by'    => $this->user->id
        ]);

        Lists::create([
            'name'          => "Success",
            'description'   => 'Success” is a term used to reflect the achievement or positive outcome of an action or endeavor. This term is commonly used in a variety of contexts, including business, education, sports, technology, and more. It describes the achievement of a goal or desired outcome.',
            'id_board'      => $post->id,
            'created_by'    => $this->user->id
        ]);
        

        if($post){
            $this->response = "success";
        }else{
            $this->response = "failed";
        };

        $this->emit('createBoard', $this->response);

    }

    public function render()
    {
        $userId = Auth::user()->id;
   
        $boards = Board::where('id_user', $userId)
            ->orWhereHas('collaborators', function ($query) use ($userId) {
                $query->where('id_user', $userId);
            })
            ->get();
 
        return view('livewire.board-component',['data' => $boards]);
    }
}
