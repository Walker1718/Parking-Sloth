<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $primaryKey='ID_Comentario';

    protected $fillable = [
        'Titulo', 'Mensaje', 'Calificacion'
    ];

    public $timestamps = true;
}
