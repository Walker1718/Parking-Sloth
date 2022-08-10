@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Importart Excel de parking a guardar</div>

                <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted"> El formato de excel tiene que cumplir una tabla con los siguientes designacion: Calle, Cuadra
 y Automoviles</h6>
 <h6 class="card-subtitle mb-2 text-muted"> Si existen datos duplicados solo se mantendra el ya existente en la base de datos</h6>


                    @if ( isset($errors) && $errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </div>
                    @else
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    @endif


                   <form action="/ImportDataSet/import" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input type="file" name="file" />
                            <button type="submit" class="btn btn-primary">Importar Excel</button>
                        </div>
                   </form>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection