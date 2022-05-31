@extends('layouts.admin')


@section('content')
    
    <div class="container-fluid">
        <div class="container">
            <h1>Test estacionamientos</h1>
            
            <form class="form-group" method="POST" action="/estacionamientos">

                {{-- NOMBRE --}}
                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" class="form-control" name='nombre'>
                </div>
                {{-- CANTIDAD --}}
                <div class="form-group">
                    <label>Cantidad:</label>
                    <input type="number" class="form-control" name='cantidad'>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>

            </form>

        </div>
    </div>

@endsection
