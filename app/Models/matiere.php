<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matiere extends Model
{
    use HasFactory;
       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom_matiere',
        'path',
        'formation_id'
    ];
    public function formation(){
        return $this-> belongsTo(formation::class);
    }
    public function langue(){
        return $this-> belongsTo(langue::class);
    }
    public function leçon(){
         return $this-> hasMany(leçon::class);
    }
}
