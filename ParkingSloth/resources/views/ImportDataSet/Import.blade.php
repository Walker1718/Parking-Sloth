@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3> Importar Excel de estacionamientos a guardar</h3></div>

                <div class="card-body">

                <ul>
                <li type="disc"> <h6 class="card-subtitle mb-2 text-muted"> El formato de Excel tiene que cumplir una tabla con la siguiente designacion: Calle, Cuadra y Automoviles</h6></li>
                <li type="disc"> <h6 class="card-subtitle mb-2 text-muted"> Si existen datos duplicados solo se mantendra el ya existente en la base de datos</h6></li>
                </ul>

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