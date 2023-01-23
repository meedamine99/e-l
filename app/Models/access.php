<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class access extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'matiere_id',
    ];

     public function setmatiere_idAttribute($value)
    {
        $this->attributes['matiere_id'] = json_encode($value);
    }

    public function getmatiere_idAttribute($value)
    {
        return $this->attributes['matiere_id'] = json_decode($value);
    }

    public function matiere(){
         return $this-> belongsTo(matiere::class);
    }
    public function user(){
         return $this-> belongsTo(user::class);
    }

}
