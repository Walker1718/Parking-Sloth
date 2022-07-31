@extends('layouts.master')

@section('head')
    <style>
        .lista_parking{
        width: 300px;
        height: 500px;
        border: 5px solid black;
        }
        .lista_parking h3{
            text-align: center
        }
        .google{
            width: 100px;
            height: 200px;
            background-color: red;
        }
    </style>
@endsection

@section('content')
        <h1>Navegar mapa</h1>
        <div class="lista_parking">
            <h3>Estacionamientos </h3>
        </div>
        <div class="google">
            <h2>prueba de google</h2>
        </div>
@endsection

@section('scripts')
        {{-- concepcion 
        estacionamiento 1
        estacionamiento 2
        estacionamiento 3 --}}
@endsection