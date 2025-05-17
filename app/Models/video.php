<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'path','lecon_id'
    ];
    public function lecon(){
        return $this-> belongsTo(lecon::class);
    }
}
