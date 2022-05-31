<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estacionamiento extends Model
{
    protected $fillable = ['Numero','Activo','Capacidad_Total','Capacidad_Utilizada','Referencia'];

    protected $primaryKey = 'ID_Estacionamiento';
    //use HasFactory;
}
