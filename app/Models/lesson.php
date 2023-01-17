<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'id_matiere',
        'id_pdf',
        'id_video'
    ];
}
