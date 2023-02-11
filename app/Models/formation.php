<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formation extends Model
{
    use HasFactory;
       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom_formation',
        'date_début',
        'date_fin',
        'path',
        'type'
    ];
    public function matiere(){
        return $this-> hasMany(matiere::class);
    }
}
