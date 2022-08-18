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
    </style>
@endsection

@section('content')
        <h1>Navegar mapa</h1>
        <div class="lista_parking">
            <h3>Estacionamientos </h3>
        </div>

        <div id="map">
            
        </div>
@endsection

{{-- APIKEY DE GOOGLE MAPS: AIzaSyDvmH6QiErR_xIveen3r1D-hOZ0y4lDAG4  ... NO USAR SIN PERMISO DE ELI. ES SU TARJETA DE CREDITO--}}
@section('scripts')
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvmH6QiErR_xIveen3r1D-hOZ0y4lDAG4&callback=initMap">
        </script>

        <script src="../resources/js/map.js"></script>
@endsection