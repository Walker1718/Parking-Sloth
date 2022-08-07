@extends('layouts.master')

@section('content')
  
<div class="container">
    <div class="row">
        <div class="col">
            Nombre: {{ $usuario->Nombre }}
        </div>
    </div>
    <div class="row">
        <div class="col">
            Apellido: {{ $usuario->Apellido }}
        </div>
    </div>
    <div class="row">
        <div class="col">
            Rut: {{ $usuario->Rut }}
        </div>
    </div>
    <div class="row">
        <div class="col">
            Email: {{ $usuario->Email }}
        </div>
    </div>
</div>
@stop
