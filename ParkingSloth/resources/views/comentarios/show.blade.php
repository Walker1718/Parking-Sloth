@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-12"> 
      <a href="{{url('/comentarios/')}}" class="btn btn-primary btn-lg " >Volver</a>
      
      
    </div>
  </div>
  <br>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Comentario Nº{{$ComentarioVerMas->ID_Comentario}}</h3>
        </div>
        <div class="card-body table-responsive p-0" style="height: 200px;">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th>Id Comentario</th>
                    <th>Título</th>
                    <th>Calificación</th>
                </tr>
            </thead>
            <tbody>
            <tr> 
                <td>{{$ComentarioVerMas->ID_Comentario}}</td>
                <td>{{$ComentarioVerMas->Titulo}}</td>
                <td>{{$ComentarioVerMas->Calificacion}}</td>
            </tr>
            </table>
            <br>
            <div class="container-fluid">
                <h5>Mensaje</h5>
                <p>{{$ComentarioVerMas->Mensaje}}</p>
            </div>
        </div>
    </div> 

@stop