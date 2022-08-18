@extends('layouts.master')

@section('content')

<form action="{{url('/reportes')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <section class="content">

        @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">

            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}} </li>
                @endforeach
            </ul>

        </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Reporte</h3>
                    </div>
                    <div class="card-body" style="display: block;">



                        <div class="form-group">
                            <label for="ID_Estacionamiento">{{'ID_Estacionamiento'}}</label>

                            <select name="ID_Estacionamiento" id="ID_Estacionamiento" class="form-control custom-select {{$errors->has('ID_Estacionamiento')?'is-invalid':''}}"     >
                                <option value="">-- ID_Estacionamiento --</option>
                                @foreach ($estacionamientos as $estacionamientos)
                                <option value="{{$estacionamientos['ID_Estacionamiento']}}"> {{$estacionamientos['ID_Estacionamiento']}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('ID_Estacionamiento','<div class="invalid-feedback"> :message</div>') !!}

                        </div>

                        <div class="form-group">
                            <label for="Titulo">{{'Título'}}</label>
                            <input type="text" name="Titulo" id="Titulo"
                                value=""
                                class="form-control {{$errors->has('Titulo')?'is-invalid':''}}">

                            {!! $errors->first('Titulo','<div class="invalid-feedback"> :message</div>') !!}

                        </div>

                        <div class="form-group">
                            <label for="Mensaje">{{'Mensaje'}}</label>
                            <textarea name="Mensaje" id="Mensaje"

                                class="form-control {{$errors->has('Mensaje')?'is-invalid':''}}"
                                rows="4"></textarea>

                            {!! $errors->first('Mensaje','<div class="invalid-feedback"> :message</div>') !!}

                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <a href="{{url('/reportes')}}" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="Enviar" class="btn btn-success float-right">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        
    </section>
</form>
@endsection