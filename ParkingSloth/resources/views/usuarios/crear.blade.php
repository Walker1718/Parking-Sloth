@extends('layouts.master')

@section('content')
    <form action="{{url('/api/usuarios/guardar')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
        </div>
        <div class="form-group">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido">
        </div>
        <div class="form-group">
            <label for="rut" class="form-label">Rut</label>
            <input type="text" class="form-control" name="rut" id="rut">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Correo electronico</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="rol" class="form-label">Rol</label>
            <select class="form-select" name="rol" id="rol" aria-label="Default select example">
                <option value="0">Seleccione un rol disponible</option>
                @foreach ($roles as $rol)
                    <option value="{{$rol->ID_Rol}}">{{$rol->Nombre}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop