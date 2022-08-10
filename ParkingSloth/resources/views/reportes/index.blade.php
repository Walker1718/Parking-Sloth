@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{url('/reportes/create')}}" class="btn btn-primary btn-lg float-right">Crear Nuevo Reporte</a>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
        
        <h3 class="card-title">Reportes</h3>
        <input  style="float: right" type="text" placeholder="Buscar" name="search" id="search"
        class="from-control" />
        
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 700px;">
        <table class="table" id="TablaReportes">
            <thead >
                <tr>
                    <th>N°Reporte</th>
                    <th>Rut Usuario</th>
                    <th>Título de Reporte</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($reportes as $reportes)
                <tr>
                        <td>{{$reportes->ID_Reporte}}</td>
                        <td>
                            @foreach ($usuarios as $usuario)
                                @if ($usuario->ID_Usuario == $reportes->ID_Usuario)
                                    {{$usuario->Rut}}
                                @endif                            
                            @endforeach
                        </td>   
                        <td>{{$reportes->Titulo}}</td>

                        {{-- Boton de Ver detalle completo --}}
                        <td>
                            <form method="post" action="{{url('/reportes/'.$reportes->ID_Reporte)}}">
                                {{csrf_field() }}
                                {{method_field('GET')}}
                                <button type="submit" class="btn btn-block btn-success">Ver mas</button>
                            </form>
                        </td>
                        
                        {{-- Boton de editar --}}
                        {{-- <td>
                            <input type="button" class="btn btn-block btn-warning" name="btn" value="Editar" id="submitBtn"
                                data-toggle="modal" data-target="#edit-modal" class="btn btn-default" />

                            <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">¿Editar?</h5>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Cancelar</button>
                                                <a href="{{url('/reportes/'.$reportes->ID_Reporte.'/edit')}}">
                                                <button type="submit" class="btn btn-primary">Aceptar</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </td>  --}}
                        
                        {{-- <td>
                            <input type="button" class="btn btn-block btn-success" name="btn" value="Ver Mensaje" id="BotonVerMensaje"
                            data-toggle="modal" data-target="#MensajeModal" class="btn btn-default" />

                            <div class="modal fade" id="MensajeModal" tabindex="-1" role="dialog" aria-labelledby="MensajeModalTitulo" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="MensajeModalTitulo">Mensaje Reporte nº{{$reportes->ID_Reporte}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <p>{{$reportes->Mensaje}}</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </td> --}}

                        <td>
                            <input type="button" class="btn btn-block btn-danger" name="btn" value="Eliminar" id="submitBtn"
                                data-toggle="modal" data-target="#delete-modal" class="btn btn-secondary" />
                            <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">¿Desea borrar el Reporte?</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>Si borra el Reporte no lo podra recuperar.</p>
                                          </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <form action="{{url('/reportes/'.$reportes->ID_Reporte)}}" method="post" >
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
    <!-- /.card-body -->
</div>
@endsection

@section('scripts')

{{-- Buscar en tabla --}}
<script>
    $(document).ready(function () {
        $('#search').keyup(function () {
            search_table($(this).val());
        });
        function search_table(value) {
            $('#TablaReportes tbody tr').each(function () {
                var found = 'false';
                $(this).each(function () {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                        found = 'true';
                    }
                });
                if (found == 'true') {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
</script>

@stop