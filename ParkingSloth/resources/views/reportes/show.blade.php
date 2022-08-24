@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-12"> 
      <a href="{{url('/reportes/')}}" class="btn btn-primary btn-lg " >Volver</a>
      
      
    </div>
  </div>
  <br>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Reporte Nº{{$ReporteVerMas->ID_Reporte}}</h3>
        </div>
        <div class="card-body table-responsive p-0" style="height: 250px;">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th>Id Reporte</th>
                    <th>Id Estacionamiento</th>
                    <th>Título</th>
                    <th>Calle</th>
                    <th>Número</th>
                    <th>Fecha de creación</th>
                </tr>
            </thead>
            <tbody>
            <tr> 
                <td>{{$ReporteVerMas->ID_Reporte}}</td>
                <td>{{$ReporteVerMas->ID_Estacionamiento}}</td>
                <td>{{$ReporteVerMas->Titulo}}</td>
                
                @foreach ($estacionamientos as $estacionamiento)
                    
                    
                        @foreach ($lista_estacionamientos as $lista_estacionamiento)
                        @if ($estacionamiento->ID_Lista == $lista_estacionamiento->ID_Lista && $estacionamiento->ID_Estacionamiento == $ReporteVerMas->ID_Estacionamiento)
                            <td>{{$lista_estacionamiento->Nombre_Calle}}</td>
                            <td>{{$estacionamiento->Numero}}</td>
                        @endif   
                        @endforeach
                        
                                               
                @endforeach

                <td>{{$ReporteVerMas->created_at}}</td>
                
            </tr>
            </table>
            <br>
            <div class="container-fluid">
                <h5>Mensaje</h5>
                <p>{{$ReporteVerMas->Mensaje}}</p>
            </div>
        </div>
    </div> 

@stop

@section('scripts')
    {{-- <script>
        //si el usuario esta logeado
        if(usuarioJson){
            const usuario = JSON.parse(usuarioJson);
            // rol 1 es admin, rol 2 es moderador
            const rol = usuario.ID_Rol;
            // si rol no coincide con el deseado, mandar al home
            if(rol != 1){
                const url = "{{ url('/navegarmapa') }}"
                window.location.replace(url);
            }
        }
        // si necesita estar logeado, mandar al login
        else{
            const url = "{{ url('/') }}"
            window.location.replace(url);
        }
    </script> --}}
@endsection