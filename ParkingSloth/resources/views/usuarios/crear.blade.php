@extends('layouts.master')

@section('content')

<script>
    //si el usuario esta logeado
    if(usuarioJson){
        const usuario = JSON.parse(usuarioJson);
         // rol 1 es admin, rol 2 es moderador
        const rol = usuario.ID_Rol;
        // si rol no coincide con el deseado, mandar al home
        if(rol != 1){
            const url = "{{ url('/home') }}"
            window.location.replace(url);
        }
    }
    // si necesita estar logeado, mandar al login
    else{
        const url = "{{ url('/') }}"
        window.location.replace(url);
    }
</script>

    <form action="{{url('/usuarios/guardarDatos')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input 
                type="text"
                class="form-control @error('nombre') is-invalid @enderror" 
                name="nombre" 
                id="nombre"
                value="{{ old('nombre') }}"
            >
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="apellido" class="form-label">Apellido</label>
            <input 
                type="text"
                class="form-control @error('apellido') is-invalid @enderror"
                name="apellido"
                id="apellido"
                value="{{ old('apellido') }}"
            >
            @error('apellido')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="rut" class="form-label">Rut</label>
            <input 
                type="text" 
                class="form-control @error('rut') is-invalid @enderror"
                name="rut"
                id="rut"
                value="{{ old('rut') }}"
            >
            @error('rut')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Correo electronico</label>
            <input 
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                name="email"
                id="email"
                value="{{ old('email') }}"
            >
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="rol" class="form-label">Rol</label>
            <select 
                class="form-select @error('rol') is-invalid @enderror" 
                name="rol" 
                id="rol" 
                aria-label="Default select example"
            >
                <option value="0">Seleccione un rol disponible</option>
                @foreach ($roles as $rol)
                    <option 
                        value="{{$rol->ID_Rol}}">{{$rol->Nombre}}
                    </option>
                @endforeach
            </select>
            @error('rol')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>


@stop