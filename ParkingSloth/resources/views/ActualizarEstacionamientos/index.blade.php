@extends('layouts.master')

@section('content')

<div class="container-fluid">
        <div class="container">
            <h1>LISTA ESTACIONAMIENTOS ASIGNADO</h1>
            
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nombre Estacionamiento</th>
					<th>Estacionamiento Referencia</th>
					<th>Estacionamiento Activo</th>
                    <th>Horario</th>
					<th>Turno Activo</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Estacionamiento as $estacionamiento)
                                          
                        <tr>
                            <th>{{$estacionamiento->Nombre_Calle}} {{$estacionamiento->Numero}}</th>
							<td>{{$estacionamiento->Referencia}}</td>
							<td>{{$estacionamiento->Activo}}</td>
                            <th>{{$estacionamiento->Horario}}</th> 
							<th>{{$estacionamiento->TurnoAsistencia}}</th>
							
                        </tr>
                        
                    @endforeach
                </tbody>
              </table>
            
        </div>
    </div>
@endsection