<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    /**
     * Display the registration view.
     */
    public function show()
    {
        $userId = Auth::user()->id;
   
        $boards = Board::where('id_user', $userId)
            ->orWhereHas('collaborators', function ($query) use ($userId) {
                $query->where('id_user', $userId);
            })
            ->get();

        return view('dashboard',['data' => $boards]);
    }
}
