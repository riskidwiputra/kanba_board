<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_board',
        'description',
        'created_by'
    ];
     // Relasi dengan tabel "board"
     public function board()
     {
         return $this->belongsTo(Board::class, 'id_board', 'id');
     }
 
     // Relasi dengan tabel "card"
     public function cards()
     {
         return $this->hasMany(Cards::class, 'id_list', 'id');
     }
    
}
