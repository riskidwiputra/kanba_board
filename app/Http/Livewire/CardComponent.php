<?php

namespace App\Http\Livewire;

use App\Models\Board;
use App\Models\Cards;
use App\Models\labels;
use App\Models\Lists;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CardComponent extends Component
{
    public $idBoard,$response,$user;

    public $detailNameCard,$detailNameBacklog,$detailAssign,$detailCreatedBy,$detailLabel,$detailCreatedAt,$detailDueDate,$detailDescription;

    public $title,$label,$id_list,$description,$assign,$due_date;

    public $myLabelName,$myLabelId,$myAssignName,$myAssignId,$myListName,$myListId,$myLists,$myIdCard;
  
    public $list;
    
    protected $listeners = [
        'updateIdList' => 'updateIdList',
        'detailCard' => 'detailCard',
        'createCard' => '$refresh',
        'deleteConfirmedCard' => 'deleteConfirmedCard',
        'updateCard' => '$refresh'
        // 'deleleCard' => '$refresh',
    ];
    
    public function mount($id)
    {
        $this->idBoard = $id;
        $this->user = Auth::user();
    }
    public function updateIdList($value){
        $this->id_list = $value;
    }
    public function DetailCardFunction($value){
        $id_card = $value;
        $card = Cards::where('id', $id_card)->with('list')->with('assigns')->with('label')->with('createdBy')->first();
        $this->detailNameCard = $card->title;
        $this->detailNameBacklog = $card->list->name;
        $this->detailAssign = $card->assigns;
        $this->detailCreatedBy = $card->createdBy->name;
        $this->detailLabel = optional($card->label)->title ?? '';
        $this->detailCreatedAt = $card->created_at;
        $this->detailDueDate = $card->due_date;
        $this->detailDescription = $card->description;
    }
    public function resetFields(){
    
        $this->title= "";
        $this->label="";
        $this->description ="";
        $this->assign ="";
        $this->due_date ="";

    }
    
    public function insertCard(){

        $data =[
            "title" =>$this->title,
            "label"=>$this->label,
            "id_list"=>$this->id_list,
            "description"=>$this->description,
            "assign"=>(int)$this->assign,
            "due_date"=>$this->due_date,
        ];

        $card = Cards::create([
            'id_list'     => $this->id_list,
            'title'         => $this->title,
            'description'     => $this->description,
            'id_label'     => $this->label,
            'due_date'     => $this->due_date,
            'created_by'    =>  $this->user->id
        ]);
        $userAssign = User::find($this->assign);
        
        $card->assigns()->attach($userAssign);

        if($card){
            $this->response = "success";
        }else{
            $this->response = "failed";
        };

        $this->emit('createCard', $this->response);
    }
    public function deleteDataCard($id)
    {

        $card = Cards::find($id);

        $this->emit('confirmDeleteCard', $card );
    }

    public function deleteConfirmedCard($id){
        
        $card = Cards::find($id);
        // $cardAssign = 
        $card->assigns()->detach();
        $card->delete();
        // $card->delete();
        if($card){
            $this->response = "success";
        }else{
            $this->response = "failed";
        };
        $this->emit('deleleCard', $this->response);
    
    }

    public function updateDataCard($id){
        $user = $this->user;
        $card = Cards::where('id',$id)->with('label')->with('list')->first();
        $this->title = $card->title;
        $this->myLabelName = optional($card->label)->title ?? '';
        $this->myLabelId = $card->id_label;
        $this->description = $card->description;
        $this->myAssignName= "asd";
        $this->myAssignId = $user->id;
        $this->due_date = $card->due_date;
        $this->myListName = $card->list->name;
        $this->myListId = $card->list->id;
        $this->myIdCard = $card->id;
        $myIdBoard= $card->list->id_board;
        $this->myLists = Lists::where('id_board',$myIdBoard)->get();
     
    }
    public function UpdateCard(){
        $id_card = $this->myIdCard;
        $card = Cards::find($id_card);
        $updateData = $card->update([
            'title' => $this->title,
            'description'=> $this->description,
            'due_date'=> $this->due_date,
            'id_label'=> $this->myLabelId,
            'id_list'=> $this->list,
        ]);
        if($updateData){
            $this->response = "success";
        }else{
            $this->response = "failed";
        };

        $this->resetFields();

        $this->emit('updateCard', "success"); 
    }


    public function render()
    {

        $board = Board::where('id', $this->idBoard)->first();
        $list = Lists::where('id_board', $board->id)->with('cards', function($c){
                $c->with('label');
                $c->with('assigns');
        })->get();
   
        $labels = labels::all();

        $data = [
            'board' => $board,
            'list' => $list,
            'labels' => $labels
        ];
      

        return view('livewire.card-component',['data' => $data]);
    }
}
