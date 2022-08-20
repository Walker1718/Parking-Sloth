<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estacionamiento extends Model
{
    use HasFactory;

    protected $fillable = ['ID_Lista','Numero','Numero','Activo','Capacidad_Total','Capacidad_Utilizada','Referencia'];

    protected $primaryKey = 'ID_Estacionamiento';
    //use HasFactory;

    public function Estacionamiento_asignado()
    {
    return $this->belongsToMany(estacionamientos::class, 'estacionamiento_asignados');
    }
}


