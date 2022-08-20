<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $primaryKey='ID_Reporte';

    protected $fillable = [
        'ID_Estacionamiento', 'Titulo', 'Mensaje'
    ];

    public $timestamps = true;
}
