@extends('layouts.master')


@section('content')
    
    <div class="container-fluid">
        <div class="container">

            <h1>Estacionamientos asignados </h1>

            <a class="btn btn-primary" href="/asignar_estacionamientos/create">Asignar estacionamiento</a>
   
            <div>
                <div class="row">
                    <table class="table table-bordered table-responsive-lg">
                  <tr>
                    <th>ID Estacionamiento</th>
                    <th>Calle</th>
                    <th>Número</th>
                    <th>Moderador</th>
                    <th>Capacidad</th>
                    <th>Activo</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach($estacionamientos as $estacionamiento)
  
                    @foreach ($estacionamientos_asignados as $estacionamiento_asignado)
                               
                    @foreach($usuarios as $usuario)
                        @if($estacionamiento->ID_Estacionamiento == $estacionamiento_asignado->ID_Estacionamiento 
                        && $usuario->ID_Usuario == $estacionamiento_asignado->ID_Usuario)
                        <tr>
                            <td>{{$estacionamiento_asignado->ID_Estacionamiento}}</td>

                            @foreach($listaEstacionamientos as $listaEstacionamiento)
                                
                                @if($listaEstacionamiento->ID_Lista == $estacionamiento->ID_Lista )
                                    <td>{{$listaEstacionamiento->Nombre_Calle}}</td>
                                @endif
                            @endforeach

                            <td>{{$estacionamiento->Numero}}</td>
                            {{-- <td>{{$estacionamiento->Capacidad_Total}}</td> --}}

                            <td>{{$usuario->Nombre}}</td>

                            <td>{{$estacionamiento->Capacidad_Utilizada.'/'.$estacionamiento->Capacidad_Total}}</td>
                            @if($estacionamiento->Activo == 1)
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
                                        <label class="form-check-label" for="flexSwitchCheckCheckedDisabled"></label>
                                      </div>
                                </td>
                            @else
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
                                        <label class="form-check-label" for="flexSwitchCheckDisabled"></label>
                                    </div>
                                </td>
                                
                            @endif

                            {{-- BOTONES --}}
                            {{-- EDIT --}}
                            {{-- <td>
                                <a href="../estacionamientos/{{$estacionamiento->ID_Estacionamiento}}/edit">
                                    <i class="fas fa-edit  fa-lg"></i></a>
                                
                                
                              

                            </td> --}}

                            
                                
                            
                        </td>
                            
                        </tr>
                        @endif
                        
                    @endforeach

                    @endforeach

                    @endforeach
                </tbody>
              </table>
        </div>
    </div>

@endsection