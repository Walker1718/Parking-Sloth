<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaEstacionamientos extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre_Calle'];

    protected $primaryKey = 'ID_Lista';
}
