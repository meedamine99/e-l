<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leçon extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'matiere_id',

    ];

    public function matiere(){
         return $this-> belongsTo(matiere::class);
    }
    public function leçon(){
         return $this-> hasMany(leçon::class);
    }
}
