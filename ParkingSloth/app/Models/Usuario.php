<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'Usuario';

    protected $fillable = [
        'Nombre',
        'Apellido',
        'Rut',
        'Email',
        'Contraseña',
    ];

    public function rol()
    {
        return $this->hasOne('Rol');
    }

}
