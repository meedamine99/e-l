<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leçon extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'id_matiere',
        'id_pdf',
        'id_video'
    ];

    public function matiere(){
         return $this-> belongsTo(matiere::class);
    }
}
