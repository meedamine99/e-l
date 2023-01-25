<?php

namespace App\Models;

use App\Models\User;
use App\Models\matiere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class adminTimeTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'formateur',
        'heur start',
        'heur end',
        'matiere',
        'day',
    ]; 
    public function matiere(){
         return $this-> belongsTo(matiere::class);
    }
    public function user(){
         return $this-> belongsTo(User::class);
    }
}
