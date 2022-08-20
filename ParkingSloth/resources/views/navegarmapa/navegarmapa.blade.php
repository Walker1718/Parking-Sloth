@extends('layouts.master')

@section('head')
    <style>
        #map {
            height: 500px;
            width: 70%;
            padding: 0;
            margin: 0;
        }

        .lista_estacionamientos{
            position: absolute;
            width: fit-content;
            height: fit-content;
            border: 5px solid #adadad18;
            background-color: #adadad70;
            border-radius: 5px;
            left: 75vw;
            /* font-weight: bold; */
            text-transform: uppercase;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between; 
        }

        .lista_estacionamientos p:hover{
            color: blue;
        }

        .lista_estacionamientos h6{
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
        {{-- <h1 style=padding:1rem>Encuentra tu estacionamiento</h1> --}}
        <div class="lista_estacionamientos">
            <h6>Busca tu estacionamiento</h6>
            <div class="nombre_estacionamientos" id="nombre_estacionamientos"></div>
        </div>
        <div id="map"></div>

        
@endsection

{{-- APIKEY DE GOOGLE MAPS: AIzaSyDjXeLYYRnc_sr8FyNRS9kVhikDvwi3vCE  ... NO USAR SIN PERMISO DE ELI. ES SU TARJETA DE CREDITO--}}
{{-- EL ID DEL MAPA CONFIGURADO DE GOOGLE: 6780ea5549035eec --}}

@section('scripts')
        
        <script src="{{ asset('js/estacionamientos.js')}}"></script>

        <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjXeLYYRnc_sr8FyNRS9kVhikDvwi3vCE&map_ids=6780ea5549035eec&callback=initMap">
        </script>

        <script src="{{ asset('js/map.js')}}"></script>

@endsection