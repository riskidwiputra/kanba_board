<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'id_user'
    ];

    // Definisikan relasi dengan pengguna (kolaborator)
    public function collaborators()
    {
        return $this->belongsToMany(User::class, 'board_collaborators', 'id_board', 'id_user');
    }
}
