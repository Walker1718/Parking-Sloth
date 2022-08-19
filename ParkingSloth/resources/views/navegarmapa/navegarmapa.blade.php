@extends('layouts.master')

@section('head')
    <style>
        #map {
            height: 500px;
            width: 50%;
            padding: 0;
            margin: 0;
        }

        .lista_estacionamientos{
            position: absolute;
            width: fit-content;
            height: fit-content;
            /* border: 5px solid #adadad18; */
            left: 60vw;
            background-color: #adadad70;
            border-radius: 5px;.
            font-weight: bold;
            text-transform: uppercase;
            display: flex;
            flex-direction: column;
            justify-content: space-between; 
        }

        .lista_estacionamientos h5{
            text-align: center;
            padding: 1rem;
            border-bottom: 3px solid #4e72df90;
        }

        .nombre_estacionamientos{
            flex: 1;
            padding: 1rem;
            cursor: pointer;
        }
        
    </style>
@endsection

@section('content')
        <h1>Prueba</h1>
        <div class="lista_estacionamientos">
            <h5>Nombre estacionamientos</h5>
            <div class="nombre_estacionamientos" id="nombre_estacionamientos"></div>
        </div>
        <div id="map"></div>

        
@endsection

{{-- APIKEY DE GOOGLE MAPS: AIzaSyDjXeLYYRnc_sr8FyNRS9kVhikDvwi3vCE  ... NO USAR SIN PERMISO DE ELI. ES SU TARJETA DE CREDITO--}}
@section('scripts')
        
        <script src="{{ asset('js/estacionamientos.js')}}"></script>

        <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjXeLYYRnc_sr8FyNRS9kVhikDvwi3vCE&callback=initMap">
        </script>

        <script src="{{ asset('js/map.js')}}"></script>

@endsection