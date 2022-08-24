@extends('layouts.master')


@section('content')
    
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Crear Estacionamiento</h3>
                            <p>Porfavor complete los campos para asignar un estacionamiento a un moderador.</p>
                        </div>
                        <div class="card-body" style="display: block;">
            
            {{-- <form class="form-group" method="POST" action="{{url('/usuarios/{{$usuario->ID_Usuario}}/estacionamientos/guardarEstacionamientoasignado')}}""> --}}

                <form class="form-group" action="{{route('asignar_estacionamientos.store')}}" method="POST">
                @csrf

                {{-- CALLE A ASIGNAR --}}
                <label>Estacionamiento</label>
                <select class="form-select" name="estacionamientoAsignado" id="estacionamientoAsignado" aria-label="Seleccione un estacionamiento para asignar" required>
                    <option value="">Seleccione un estacionamiento para asignar</option>
                    @foreach ($estacionamientos as $estacionamiento)

                    <option 
                        value="{{$estacionamiento->ID_Estacionamiento}}">
                        {{$estacionamiento->Numero}} {{$estacionamiento->Nombre_Calle}}
                    </option>

                        
                    @endforeach
                </select>

                {{-- MODERADOR ASIGNADO --}}
                <label>Moderador</label>
                <select class="form-select" name="moderadorAsignado" id="moderadorAsignado" aria-label="Seleccione un moderador para el estacionamiento" required>
                    <option value="">Seleccione un moderador para el estacionamiento</option>
                    @foreach ($usuarios as $usuario)

                        <option 
                            value="{{$usuario->ID_Usuario}}">{{$usuario->Nombre}} {{$usuario->Apellido}}
                        </option>

                        
                    @endforeach
                </select>

                {{-- Fecha --}}
                
                <div class="form-group">
                    <label>Fecha</label>
                    <input type="date" class="form-control" name='fecha' min="2000-01-02" required >
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <a href="{{url('/asignar_estacionamientos')}}" class="btn btn-secondary">Volver</a>
                        <button type="submit" class="btn btn-primary" oninput="asignar()">Asignar</button>
                    </div>
                </div>

                

            </form>

        </div>
    </div>
</div>
</div>

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

