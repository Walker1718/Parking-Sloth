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
        <div class="card-body table-responsive p-0" style="height: 200px;">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th>ID_Reporte</th>
                    <th>ID_Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Rut</th>
                    <th>Email</th>
                    <th>Título</th>
                </tr>
            </thead>
            <tbody>
            <tr> 
                <td>{{$ReporteVerMas->ID_Reporte}}</td>
                <td>{{$ReporteVerMas->ID_Usuario}}</td>
                
                @foreach ($usuarios as $usuario)
                    @if ($usuario->ID_Usuario == $ReporteVerMas->ID_Usuario)
                        <td>{{$usuario->Nombre}}</td>
                        <td>{{$usuario->Apellido}}</td>
                        <td>{{$usuario->Rut}}</td>
                        <td>{{$usuario->Email}}</td>
                    @endif                            
                @endforeach
                
                <td>{{$ReporteVerMas->Titulo}}</td>
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