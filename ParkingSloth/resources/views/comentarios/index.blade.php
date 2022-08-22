@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{url('/comentarios/create')}}" class="btn btn-primary btn-lg float-right">Crear Nuevo</a>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
        <br>
        <h3 class="card-title">Comentarios y Calificaciones</h3>
        <input  style="float: right" type="text" placeholder="Buscar" name="search" id="search"
        class="from-control" />
        
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 700px;">
        <table class="table" id="Tablacomentarios">
            <thead >
                <tr>
                    <th>N°Comentario</th>
                    <th>Título de Reporte</th>
                    <th>Calificación (1 - 5)</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($comentarios as $comentario)
                <tr>
                        <td>{{$comentario->ID_Comentario}}</td>  
                        <td>{{$comentario->Titulo}}</td>
                        <td>{{$comentario->Calificacion}} <span class="fa fa-star" style="color:orange;"></span> </td>

                        {{-- Boton de Ver detalle completo --}}
                        <td>
                            <form method="post" action="{{url('/comentarios/'.$comentario->ID_Comentario)}}">
                                {{csrf_field() }}
                                {{method_field('GET')}}
                                <button type="submit" class="btn btn-block btn-success">Ver mas</button>
                            </form>
                        </td>

                        <td>
                            <input type="button" class="btn btn-block btn-danger" name="btn" value="Eliminar" id="submitBtn"
                                data-toggle="modal" data-target="#delete-modal" class="btn btn-secondary" />
                            <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">¿Desea borrar el comentario?</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>Si borra el comentario no lo podra recuperar.</p>
                                          </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <form action="{{url('/comentarios/'.$comentario->ID_Comentario)}}" method="post" >
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
        <div class="d-flex justify-content-center">
            {{ $comentarios->links() }}
        </div>
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
            $('#Tablacomentarios tbody tr').each(function () {
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