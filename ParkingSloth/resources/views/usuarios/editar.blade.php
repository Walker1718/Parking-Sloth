@extends('layouts.master')

@section('content')
    <form action="{{url('usuarios/'.$usuario->ID_Usuario.'/actualizarDatos' )}}" method="POST">
        @method('PATCH')
        @csrf

        <div class="form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{$usuario->Nombre}}">
        </div>
        <div class="form-group">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido"  value="{{$usuario->Apellido}}">
        </div>
        <div class="form-group">
            <label for="rut" class="form-label">Rut</label>
            <input 
                type="text" 
                class="form-control @error('rut') is-invalid @enderror"
                name="rut"
                id="rut"
                value="{{ $usuario->Rut }}"
            >
            @error('rut')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Correo electronico</label>
            <input type="email" class="form-control" name="email" id="email"  value="{{$usuario->Email}}">
        </div>
        <div class="form-group">
            <label for="rol" class="form-label">Rol</label>
            <select class="form-select" name="rol" id="rol" aria-label="Default select example">
                <option value="0">Seleccione un rol disponible</option>
                @foreach ($roles as $rol)
                    <option 
                        value="{{$rol->ID_Rol}}"
                        @if ($rol->ID_Rol == $usuario->ID_Rol)
                            selected
                        @endif
                    >{{$rol->Nombre}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop