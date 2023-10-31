<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    use HasFactory;

     protected $dateFormat = 'Y-m-d';

    protected $fillable = [
        'id_list',
        'title',
        'description',
        'id_label',
        'due_date',
        'id_assign',
        'created_by',
    ];
     // Relasi dengan tabel "card_assigns"
     public function assigns()
     {
         return $this->belongsToMany(User::class, 'card_assigns', 'id_card', 'id_user');
     }
 
     // Relasi dengan tabel "list"
     public function list()
     {
         return $this->belongsTo(Lists::class, 'id_list', 'id');
     }
 
     // Relasi dengan tabel "label"
     public function label()
     {
         return $this->belongsTo(labels::class, 'id_label', 'id');
     }
     
     public function createdBy(){
        return $this->belongsTo(Lists::class, 'created_by', 'id');
     }
}
