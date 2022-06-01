@extends('layouts.master')


@section('content')
    
    <div class="container-fluid">
        <div class="container">
            <h1>LISTA ESTACIONAMIENTOS</h1>

            <a class="btn btn-primary" href="../estacionamientos/create">Crear estacionamiento</a>
            
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID Estacionamiento</th>
                    <th>Número</th>
                    <th>Capacidad</th>
                    <th>Activo</th>
                    <th>Gestion</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($estacionamientos as $estacionamiento)
                                          
                        <tr>
                            <td>{{$estacionamiento->ID_Estacionamiento}}</td>
                            <td>{{$estacionamiento->Numero}}</td>
                            {{-- <td>{{$estacionamiento->Capacidad_Total}}</td> --}}
                            <td>{{$estacionamiento->Capacidad_Utilizada.'/'.$estacionamiento->Capacidad_Total}}</td>
                            <td>{{$estacionamiento->Activo}}</td>

                            {{-- BOTONES --}}
                            
                            <td>
                                <a class="btn btn-primary" href="../estacionamientos/{{$estacionamiento->ID_Estacionamiento}}/edit">U</a>
                                <form class="form-group" method="POST" action="../estacionamientos/{{$estacionamiento->ID_Estacionamiento}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">D</button>
                                </form>
                                {{-- <a class="btn btn-danger" href="../estacionamientos/{{$estacionamiento->ID_Estacionamiento}}">D</a> --}}

                            </td>
                            
                        </tr>
                        
                    @endforeach
                </tbody>
              </table>
            
        </div>
    </div>

@endsection