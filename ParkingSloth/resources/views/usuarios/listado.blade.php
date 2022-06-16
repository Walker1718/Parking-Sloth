@extends('layouts.master')

@section('content')
    <div>
        <div class="row">
            <div class="col col-xs" style="margin-inline: 0px; padding-inline: 0px">
                <a class="btn btn-primary sm" href="{{url('/usuarios/crear')}}">Crear usuario</a>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered table-responsive-lg">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Rut</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Fecha de creación</th>
                    <th>Fecha de actualización</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->ID_Usuario }}</td>
                        <td>{{ $usuario->Nombre }}</td>
                        <td>{{ $usuario->Apellido }}</td>
                        <td>{{ $usuario->Rut }}</td>
                        <td>{{ $usuario->Email }}</td>
                        <td>{{ $usuario->Rol->Nombre }}</td>
                        <td>{{ $usuario->created_at }}</td>
                        <td>{{ $usuario->updated_at }}</td>
                        <td>
                            <form action="" method="POST">
    
                                <a href="{{url('/usuarios/'.$usuario->ID_Usuario.'/editar')}}">
                                    <i class="fas fa-edit  fa-lg"></i>
                                </a>
    
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                    <i class="fas fa-trash fa-lg text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>  
    </div>
@stop