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
                    <th>ID_Reporte</th>
                    <th>ID_Estacionamiento</th>
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
                    @if ($estacionamiento->ID_Estacionamiento == $ReporteVerMas->ID_Estacionamiento)
                        @foreach ($lista_estacionamientos as $lista_estacionamiento)
                            <td>{{$lista_estacionamiento->Nombre_Calle}}</td>
                            
                        @endforeach
                        <td>{{$estacionamiento->Numero}}</td>
                    @endif                            
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