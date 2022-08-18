@extends('layouts.master')

@section('head')
    <style>
        .pagina{
            width: 1000px;
            height: 800px;
            margin: 0;
            padding: 0;
        }

        #map {
            height: 100%;
            width: 100%;
        }
    </style>
@endsection

@section('content')
        <div class="pagina">
            <h1>Prueba</h1>
            <div id="map"></div>
        </div>
        
@endsection

{{-- APIKEY DE GOOGLE MAPS: AIzaSyDjXeLYYRnc_sr8FyNRS9kVhikDvwi3vCE  ... NO USAR SIN PERMISO DE ELI. ES SU TARJETA DE CREDITO--}}
@section('scripts')

        
        <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjXeLYYRnc_sr8FyNRS9kVhikDvwi3vCE&callback=initMap">
        </script>

        {{-- <script>
            let map;

        function initMap() {
            let concepcion = { lat: -34.397, lng: 150.644 }
            
            map = new google.maps.Map(document.getElementById("map"), {
            center: concepcion,
            zoom: 10,
            });
        }

        </script> --}}
        
        {{-- <script src="../public/js/map.js"></script> --}}
        <script src="{{ asset('js/map.js')}}"></script>

@endsection