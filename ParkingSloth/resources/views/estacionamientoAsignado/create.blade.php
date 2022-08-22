@extends('layouts.master')


@section('content')
    
    <div class="container-fluid">
        <div class="container">
            <h1>Asignar estacionamiento</h1>
            
            {{-- <form class="form-group" method="POST" action="{{url('/usuarios/{{$usuario->ID_Usuario}}/estacionamientos/guardarEstacionamientoasignado')}}""> --}}

                <form class="form-group" action="{{route('asignar_estacionamientos.store')}}" method="POST">
                @csrf

                {{-- CALLE A ASIGNAR --}}
                <label>Estacionamiento</label>
                <select class="form-select" name="estacionamientoAsignado" id="estacionamientoAsignado" aria-label="Seleccione un estacionamiento para asignar" required>
                    <option value="">Seleccione un estacionamiento para asignar</option>
                    @foreach ($estacionamientos as $estacionamiento)

                        <option 
                            value="{{$estacionamiento->ID_Estacionamiento}}">{{$estacionamiento->Numero}}
                        </option>

                        
                    @endforeach
                </select>

                {{-- MODERADOR ASIGNADO --}}
                <label>Moderador</label>
                <select class="form-select" name="moderadorAsignado" id="moderadorAsignado" aria-label="Seleccione un moderador para el estacionamiento" required>
                    <option value="">Seleccione un moderador para el estacionamiento</option>
                    @foreach ($usuarios as $usuario)

                        <option 
                            value="{{$usuario->ID_Usuario}}">{{$usuario->Nombre}}
                        </option>

                        
                    @endforeach
                </select>

                {{-- Fecha --}}
                
                <div class="form-group">
                    <label>Fecha</label>
                    <input type="date" class="form-control" name='fecha' min="2000-01-02" required >
                </div>
                
                <button type="submit" class="btn btn-primary" oninput="asignar()">Asignar</button>


                

            </form>

        </div>
    </div>

@endsection


@section('scripts')

<script>
    function asignar(){
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>

            Swal.fire({
                icon: 'warning',
                title: 'Recuerda NO utilizar la aplicación mientras conduces!',
                showConfirmButton: true,          // In case you want two scenarios 
                confirmButtonText: 'Entendido',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '/navegarmapa';
                }
            })
        </script> 

    }
</script>

@endsection

