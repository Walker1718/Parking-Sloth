@extends('layouts.master')

@section('content')
    <script>
        if(usuarioJson){
            const usuario = JSON.parse(usuarioJson);
            const rol = usuario.ID_Rol;
            if(rol != 1){
                const url = "{{ url('/home') }}"
                window.location.replace(url);
            }
        }else{
            const url = "{{ url('/') }}"
            window.location.replace(url);
        }
    </script>
    <script>
        async function actualizarActivo(id){
            const base = "{{ url('/') }}"
            const url = `${base}/api/usuarios/${id}/activo`;
            try{
                const res = await axios.patch(url);
            }catch(e){
                console.error(e);
            }
        }
    </script>
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
                    <th>Activo</th>
                    <th>Editar</th>
                    <th>Estacionamientos asignados</th>
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
                            <div class="form-check form-switch">
                                <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    id="activo" 
                                    name="activo" 
                                    onchange="actualizarActivo({{$usuario->ID_Usuario }})" 
                                    @checked($usuario->Activo)
                                >
                            </div>
                        </td>
                        <td>
                            <a href="{{url('/usuarios/'.$usuario->ID_Usuario.'/editar')}}">
                                <i class="fas fa-edit  fa-lg"></i>
                            </a>
                        </td>
                        {{-- FOO --}}
                        <td>
                            
                            <a href="{{url('/usuarios/'.$usuario->ID_Usuario.'/estacionamientos')}}">
                                <i class="fas fa-parking"></i>
                            </a>

                            {{-- <select class="form-select" name="rol" id="rol" aria-label="Default select example">
                                <option value="0">Seleccione un estacionamiento para asignar</option>
                                @foreach ($estacionamientos as $estacionamiento)
                                    <option 
                                        value="{{$estacionamiento->ID_Estacionamiento}}">{{$estacionamiento->Numero}}
                                    </option>
                                @endforeach
                            </select> --}}


                        </td>
                    </tr>
                @endforeach
            </table>
        </div>  
    </div>


@stop