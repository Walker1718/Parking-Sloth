@extends('layouts.master')


@section('content')
    
    <div class="container-fluid">
        <div class="container">
            <h1>Crear estacionamiento</h1>
            
            <form class="form-group" method="POST" action="/estacionamientos">
                @csrf

                {{-- NUMERO --}}
                <div class="form-group">
                    <label>Número:</label>
                    <input type="number" class="form-control" name='numero'>
                </div>

                {{-- ACTIVO --}}
                <div class="form-group">
                    <label>Activo:</label>
                    <input type="checkbox" class="form-control" name='activo'>
                </div>
                
                {{-- CAPACIDAD TOTAL --}}
                <div class="form-group">
                    <label>Capacidad:</label>
                    <input type="number" class="form-control" name='capacidad_total'>
                </div>

                {{-- REFERENCIA --}}
                <div class="form-group">
                    <label>Referencia:</label>
                    <input type="text" class="form-control" name='referencia'>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>

            </form>

        </div>
    </div>

@endsection
