<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contenu extends Model
{
    use HasFactory;
    protected $fillable = [
        'formation',
        'heur start',
        'heur end',
        'matiere',
        'day',
    ]; 
}
