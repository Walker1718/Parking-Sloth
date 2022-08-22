@extends('layouts.master')


@section('content')
    
    <div class="container-fluid">
        <div class="container">
            <h1>Lista estacionamientos</h1>
    
            <div>
                <a class="btn btn-primary" href="../estacionamientos/create">Crear estacionamiento</a>
            </div>
            
            
            <div>
                <div class="row">
                    <table class="table table-bordered table-responsive-lg">
                <thead>
                  <tr>
                    
                    <th>ID Estacionamiento</th>
                    <th>Calle</th>
                    <th>Número</th>
                    <th>Capacidad</th>
                    <th>Activo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($estacionamientos as $estacionamiento)
                                          
                        <tr>
                            <td>{{$estacionamiento->ID_Estacionamiento}}</td>
                            @foreach($listaEstacionamientos as $listaEstacionamiento)
                            
                                @if($listaEstacionamiento->ID_Lista == $estacionamiento->ID_Lista )
                                    <td>{{$listaEstacionamiento->Nombre_Calle}}</td>
                                @endif
                            @endforeach
                            <td>{{$estacionamiento->Numero}}</td>
                            {{-- <td>{{$estacionamiento->Capacidad_Total}}</td> --}}
                            <td>{{$estacionamiento->Capacidad_Utilizada.'/'.$estacionamiento->Capacidad_Total}}</td>


                            @if($estacionamiento->Activo == 1)
                                <td>
                                    <i class="fas fa-check"></i>
                                </td>
                            @else
                                <td>
                                    <i class="fas fa-times"></i>
                                </td>
                                
                            @endif
                            

                            {{-- BOTONES --}}
                            
                            <td>
                                <a href="../estacionamientos/{{$estacionamiento->ID_Estacionamiento}}/edit">
                                    <i class="fas fa-edit  fa-lg"></i></a>
                                
                                
                                {{-- <a class="btn btn-danger" href="../estacionamientos/{{$estacionamiento->ID_Estacionamiento}}">D</a> --}}

                            </td>
                            {{-- OLD --}}
                            {{-- <td>
                                <form class="form-group" method="POST" action="/estacionamientos/{{$estacionamiento->ID_Estacionamiento}}">
                                    @method('DELETE')
                                    @csrf
                                    <a type="submit" >
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </form>
                            </td> --}}

                            {{-- FUNCIONA BORRAR CON CUADRO --}}
                            {{-- <td>
                                <form action="{{url('/estacionamientos/'.$estacionamiento->ID_Estacionamiento)}}" method="POST" >
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>

                            </td> --}}

                            {{-- BORRAR CON MODAL --}}
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
                                            <form action="{{url('/estacionamientos/'.$estacionamiento->ID_Estacionamiento)}}" method="POST" >
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
                        
                    @endforeach
                </tbody>
              </table>
            
        </div>
    </div>

@endsection