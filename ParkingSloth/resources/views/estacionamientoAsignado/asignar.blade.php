@extends('layouts.master')


@section('content')
    
    <div class="container-fluid">
        <div class="container">
            <h1>Asignar estacionamiento</h1>
            
            {{-- <form class="form-group" method="POST" action="{{url('/usuarios/{{$usuario->ID_Usuario}}/estacionamientos/guardarEstacionamientoasignado')}}""> --}}

                <form class="form-group" action="{{url('usuarios/'.$usuario->ID_Usuario.'/estacionamientos/guardarEstacionamientoAsignado')}}" method="POST">
                @csrf

                {{-- CALLE A ASIGNAR --}}
                <label>Estacionamiento</label>
                <select class="form-select" name="estacionamientoAsignado" id="estacionamientoAsignado" aria-label="Seleccione un estacionamiento para asignar" required>
                    <option value="">Seleccione un estacionamiento para asignar</option>
                    @foreach ($estacionamientos as $estacionamiento)

                        <option 
                            value="{{$estacionamiento->ID_Estacionamiento}}">{{$estacionamiento->Numero}}
                        </option>

                        
                    @endforeach
                </select>

                {{-- Fecha --}}
                <div class="form-group">
                    <label>Activo:</label>
                    <input type="date" class="form-control" name='fecha' required>
                </div>

                <button type="submit" class="btn btn-primary">Asignar</button>

            </form>

        </div>
    </div>

@endsection
