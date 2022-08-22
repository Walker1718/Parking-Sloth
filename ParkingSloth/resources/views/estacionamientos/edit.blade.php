@extends('layouts.master')


@section('content')

    <div class="container-fluid">
        <div class="container">


            <h1>Editando estacionamiento {{$estacionamiento->ID_Estacionamiento}}</h1>

            
                        
            <form class="form-group" method="POST" action="/estacionamientos/{{$estacionamiento->ID_Estacionamiento}}">
                @method('PUT')
                @csrf

                {{-- CALLE--}}
                <select class="form-select" name="ID_Lista" id="ID_Lista" aria-label="Default select example">

                    @foreach($calles as $calle)

                    @if($calle->ID_Lista == $estacionamiento->ID_Lista)
                        <option 
                            value="{{$calle->ID_Lista}}">{{$calle->Nombre_Calle}}
                        </option>
                    @endif

                    @endforeach
           
                    @foreach ($calles as $calle)

                        <option 
                            value="{{$calle->ID_Lista}}">{{$calle->Nombre_Calle}}
                        </option>

                        
                    @endforeach
                </select>
                {{-- NUMERO --}}
                
                <div class="form-group">
                    <label>Número:</label>
                    <input type="number" class="form-control" value="{{$estacionamiento->Numero}}" name='numero'>
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

                {{-- ACTIVO --}}

                <div class="form-check form-switch">

                    @if($estacionamiento->Activo == 1)
                        <input class="form-check-input" type="checkbox" id="activo" name='activo' onchange="cambioActivo()" checked>
                        <label id="labelActivo">Habilitado</label>
                    @else
                        <input class="form-check-input" type="checkbox" id="activo" name='activo' onchange="cambioActivo()" unchecked>
                        <label id="labelActivo">Inhabilitado</label>
                    @endif
                    
                    
                    
                  </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>

            </form> 
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        function cambioActivo(){
            if(document.getElementById("labelActivo").innerHTML == "Habilitado"){
                document.getElementById("labelActivo").innerHTML="Inhabilitado";
            }else{
                document.getElementById("labelActivo").innerHTML="Habilitado";
            }
            
        }
    </script>

@endsection
