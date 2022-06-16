@extends('layouts.master')

@section('content')
    <form action="{{url('/api/usuarios/guardar')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input 
                type="text"
                class="form-control" 
                name="nombre" 
                id="nombre"
                class="@error('Nombre') is-invalid @enderror"
            >
            @error('Nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="apellido" class="form-label">Apellido</label>
            <input 
                type="text"
                class="form-control"
                name="apellido"
                id="apellido"
                class="@error('Apellido') is-invalid @enderror"
            >
            @error('Apellido')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="rut" class="form-label">Rut</label>
            <input 
                type="text" 
                class="form-control"
                name="rut"
                id="rut"
                class="@error('Rut') is-invalid @enderror"
            >
            @error('Rut')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Correo electronico</label>
            <input 
                type="email"
                class="form-control"
                name="email"
                id="email"
                class="@error('Email') is-invalid @enderror"
            >
            @error('Email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="rol" class="form-label">Rol</label>
            <select 
                class="form-select" 
                name="rol" 
                id="rol" 
                aria-label="Default select example"
                class="@error('Rol') is-invalid @enderror"
            >
                <option value="0">Seleccione un rol disponible</option>
                @foreach ($roles as $rol)
                    <option value="{{$rol->ID_Rol}}">{{$rol->Nombre}}</option>
                @endforeach
            </select>
            @error('Rol')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop