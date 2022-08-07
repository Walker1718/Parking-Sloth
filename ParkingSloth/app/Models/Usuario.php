<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $id = 'ID_Usuario';
    protected $primaryKey = 'ID_Usuario';
    protected $table = 'Usuario';

    protected $fillable = [
        'Nombre',
        'Apellido',
        'Rut',
        'Email',
        'ID_Rol',
        'Contraseña',
        'Activo'
    ];

    public function Rol()
    {
        return $this->belongsTo(Rol::class,'ID_Rol','ID_Rol');
    }

}
