<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Cards;
use App\Models\Lists;
use Illuminate\Support\Facades\Auth;

class SingleBoardController extends Controller
{
    /**
     * Display the registration view.
     */
    public function show($id)
    {
   
        $board = Board::where('id', $id)->first();
        $list = Lists::where('id_board', $board->id)->with('cards', function($c){
                $c->with('label');
                $c->with('assigns');
        })->get();
        $data = [
            'board' => $board,
            'list' => $list
        ];
        return view('board.board', ['data' => $data ]);
    }
}
