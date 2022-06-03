<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $id = 'ID_Rol';
    protected $table = 'Rol';

    protected $fillable = [
        'Nombre',
        'Descripcion',
    ];

    public function usuarios(){
        return $this->hasMany(Usuario::class,'ID_Rol','ID_Rol');
    }
}
