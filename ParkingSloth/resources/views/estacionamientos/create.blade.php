@extends('layouts.master')


@section('content')
    
    <div class="container-fluid">
        <div class="container">
            <h1>Crear estacionamiento</h1>
            
            <form class="form-group" method="POST" action="/estacionamientos">
                @csrf

                {{-- CALLE--}}
                <select class="form-select" name="ID_Lista" id="ID_Lista" aria-label="Default select example">
                    <option value="0">Seleccione la calle del estacionamiento</option>
                    @foreach ($calles as $calle)

                        <option 
                            value="{{$calle->ID_Lista}}">{{$calle->Nombre_Calle}}
                        </option>

                        
                    @endforeach
                </select>



                {{-- NUMERO --}}
                <div class="form-group">
                    <label>Número:</label>
                    <input type="number" class="form-control" name='numero'>
                </div>

                {{-- LATITUD --}}
                <div class="form-group">
                    <label>Latitud:</label>
                    <input type="float" class="form-control" name='latitud'>
                </div>

                {{-- LONGITUD --}}
                <div class="form-group">
                    <label>Longitud:</label>
                    <input type="float" class="form-control" name='longitud'>
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

                {{-- ACTIVO --}}
                {{-- <div class="form-group">
                    <label>Activo:</label>
                    <input type="checkbox" class="form-control" name='activo'>
                </div> --}}

                <div class="form-check form-switch">
                    
                    <input class="form-check-input" type="checkbox" id="activo" name='activo' onchange="cambioActivo()" checked>
                    <label id="labelActivo">Habilitado</label>
                  </div>

                <button type="submit" class="btn btn-primary">Guardar</button>

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
