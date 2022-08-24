@extends('layouts.master')


@section('content')
    
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Crear Estacionamiento</h3>
                            <p>Porfavor complete los campos para la asignar un estacionamiento a {{$usuario->Nombre}} {{$usuario->Apellido}}.</p>
                        </div>
                        <div class="card-body" style="display: block;">
            
            {{-- <form class="form-group" method="POST" action="{{url('/usuarios/{{$usuario->ID_Usuario}}/estacionamientos/guardarEstacionamientoasignado')}}""> --}}

                <form class="form-group" action="{{url('usuarios/'.$usuario->ID_Usuario.'/estacionamientos/guardarEstacionamientoAsignado')}}" method="POST">
                @csrf

                {{-- CALLE A ASIGNAR --}}
                <label>Estacionamiento</label>
                <select class="form-select" name="estacionamientoAsignado" id="estacionamientoAsignado" aria-label="Seleccione un estacionamiento para asignar" required>
                    <option value="">Seleccione un estacionamiento para asignar</option>
                    @foreach ($estacionamientos as $estacionamiento)

                        <option 
                            value="{{$estacionamiento->ID_Estacionamiento}}">
                            {{$estacionamiento->Numero}} {{$estacionamiento->Nombre_Calle}}
                        </option>

                        
                    @endforeach
                </select>

                {{-- Fecha --}}
                <div class="form-group">
                    <label>Activo:</label>
                    <input type="date" class="form-control" name='fecha' required>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="{{url('usuarios/'.$usuario->ID_Usuario.'/estacionamientos')}}" class="btn btn-secondary">Volver</a>
                        <button type="submit" class="btn btn-primary">Asignar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
</div>

        </div>
    </div>

@endsection
