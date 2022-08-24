@extends('layouts.master')


@section('content')
    
    <div class="container-fluid">
        <div class="container">

            <h1>{{$usuario->Nombre}} {{$usuario->Apellido}}: Estacionamientos asignados </h1>

            
            {{-- <select class="form-select" name="rol" id="rol" aria-label="Default select example">
                                <option value="0">Seleccione un estacionamiento para asignar</option>
                                @foreach ($estacionamientos as $estacionamiento)

                                    <option 
                                        value="{{$estacionamiento->ID_Estacionamiento}}">{{$estacionamiento->Numero}}
                                    </option>

                                    
                                @endforeach
                            </select> --}}

            <a class="btn btn-primary" href="/usuarios/{{$usuario->ID_Usuario}}/estacionamientos/asignarEstacionamientos">Asignar estacionamiento</a>

           

            
            <div>
                <div class="row">
                    <table class="table table-bordered table-responsive-lg">
                  <tr>
                    <th>ID Estacionamiento</th>
                    <th>Calle</th>
                    <th>Número</th>
                    <th>Capacidad</th>
                    <th>Activo</th>
                    {{-- <th>Editar</th> --}}
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach($estacionamientos as $estacionamiento)

                        

                    
                    @foreach ($estacionamientos_asignados as $estacionamiento_asignado)
                               
                    
                        @if($estacionamiento->ID_Estacionamiento == $estacionamiento_asignado->ID_Estacionamiento)
                        

                            @foreach($listaEstacionamientos as $listaEstacionamiento)
                                
                                @if($listaEstacionamiento->ID_Lista == $estacionamiento->ID_Lista )

                                <tr>
                                    <td>{{$estacionamiento_asignado->ID_Estacionamiento}}</td>
                                    <td>{{$listaEstacionamiento->Nombre_Calle}}</td>

                                            
                                    <td>{{$estacionamiento->Numero}}</td>
                                    {{-- <td>{{$estacionamiento->Capacidad_Total}}</td> --}}
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
                                    {{-- DELETE MODAL --}}
                                    <td>
                                        <div>
                                            <a name="btn" id="submitBtn" 
                                            data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                
                                            
                                            {{-- <input type="button" name="btn" id="submitBtn" 
                                                data-toggle="modal" data-target="#delete-modal" class="btn btn-secondary" /> --}}
                                        </div>
                                    
                                        
                                    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">¿Desea borrar el estacionamiento?</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Si borra el estacionamiento no lo podrá recuperar.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <form action="{{url('/usuarios/'.$usuario->ID_Usuario.'/estacionamientos/'.$estacionamiento_asignado->ID_Estacionamiento.'/desAsignar')}}" method="POST" >
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                    <button type="submit" class="btn btn-primary">Aceptar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </td>
                            </tr>
                                @endif
                            @endforeach

                            
                        
                        @endif
                        
                        
                    @endforeach

                    @endforeach
                </tbody>
              </table>
        </div>
    </div>

@endsection