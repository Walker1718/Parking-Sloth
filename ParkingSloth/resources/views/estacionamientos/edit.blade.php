@extends('layouts.master')


@section('content')

    <div class="container-fluid">
        <div class="container">


            <h1>Editando estacionamiendo {{$estacionamiento->ID_Estacionamiento}}</h1>

            
                        
            <form class="form-group" method="POST" action="/estacionamientos/{{$estacionamiento->ID_Estacionamiento}}">
                @method('PUT')
                @csrf

                {{-- NUMERO --}}
                
                <div class="form-group">
                    <label>Número:</label>
                    <input type="number" class="form-control" value="{{$estacionamiento->Numero}}" name='numero'>
                </div>

                {{-- ACTIVO --}}
                <div class="form-group">
                    <label>Activo:</label>
                    <input type="checkbox" class="form-control" value="{{$estacionamiento->Activo}}" name='activo'>
                </div>
                
                {{-- CAPACIDAD TOTAL --}}
                <div class="form-group">
                    <label>Capacidad:</label>
                    <input type="number" class="form-control" value="{{$estacionamiento->Capacidad_Total}}" name='capacidad_total'>
                </div>

                {{-- REFERENCIA --}}
                <div class="form-group">
                    <label>Referencia:</label>
                    <input type="text" class="form-control" value="{{$estacionamiento->Referencia}}" name='referencia'>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>

            </form> 
        </div>
    </div>

@endsection