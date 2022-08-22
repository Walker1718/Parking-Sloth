@extends('layouts.master')


@section('content')
    
    <div class="container-fluid">
        <div class="container">
            <h1>Crear estacionamiento</h1>
            
            <form class="form-group" method="POST" action="/estacionamientos">
                @csrf

                @if(count($errors)>0)
                    <div class="alert alert-danger" role="alert">

                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}} </li>
                            @endforeach
                        </ul>

                    </div>
                @endif

                {{-- CALLE--}}
                <label">Calle:</label>
                <select class="form-select" name="ID_Lista" id="ID_Lista" aria-label="Seleccione la calle del estacionamiento" required>
                    <option value="">Seleccione la calle del estacionamiento</option>
                    @foreach ($calles as $calle)

                        <option 
                            value="{{$calle->ID_Lista}}">{{$calle->Nombre_Calle}}
                        </option>

                        
                    @endforeach
                </select>



                {{-- NUMERO --}}
                <div class="form-group">
                    <label>Número:</label>
                    <input type="number" class="form-control" name='numero' max="1000000" min="1" required>
                </div>

                {{-- LATITUD --}}
                <div class="form-group">
                    <label>Latitud:</label>
                    <input type="number" class="form-control" name='latitud' step="0.000000000000001" max="90" min="-90" required>
                </div>

                {{-- LONGITUD --}}
                <div class="form-group">
                    <label>Longitud:</label>
                    <input type="number" class="form-control" name='longitud' step="0.000000000000001" max="180" min="-180" required>
                </div>

                                
                {{-- CAPACIDAD TOTAL --}}
                <div class="form-group">
                    <label>Capacidad:</label>
                    <input type="number" class="form-control" name='capacidad_total' min="1" max="30" required>
                </div>

                {{-- REFERENCIA --}}
                <div class="form-group">
                    <label>Referencia:</label>
                    <input type="text" class="form-control" name='referencia' maxlength="100" minlength="0" >
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
