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
                            <label for="ID_Estacionamiento">{{'Calle'}}</label>

                            <select name="ID_Estacionamiento" id="ID_Estacionamiento" class="form-control custom-select {{$errors->has('ID_Estacionamiento')?'is-invalid':''}}"     >
                                <option value="">Seleccione dirección</option>

                                @foreach ($estacionamientos as $estacionamiento)
                                    @foreach ($lista_estacionamientos as $lista_estacionamiento)
                                        @if ($estacionamiento->ID_Lista == $lista_estacionamiento->ID_Lista)
                                        <option value="{{$estacionamiento['ID_Estacionamiento']}}"> {{$lista_estacionamiento['Nombre_Calle']}} - {{$estacionamiento['Numero']}}</option>
                                        @endif
                                    @endforeach
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
                            {{-- <textarea name="Mensaje" id="Mensaje"

                                class="form-control {{$errors->has('Mensaje')?'is-invalid':''}}"
                                rows="4"></textarea> --}}

                            <textarea id="Mensaje" name="Mensaje" class="form-control {{$errors->has('Mensaje')?'is-invalid':''}}" 
                                aria-label="With textarea" maxlength="256"></textarea>
                              <span class="help-block">
                                <p id="Mensaje_ayuda" class="help-block">Mensaje de alerta</p>
                              </span>

                            {!! $errors->first('Mensaje','<div class="invalid-feedback"> :message</div>') !!}

                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <a href="{{url('/navegarmapa')}}" class="btn btn-secondary">Volver</a>
                                <input id="submit" type="submit" value="Enviar" class="btn btn-success float-right">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        
    </section>
</form>
@endsection

@section('scripts')
    <script>

        $('#Mensaje_ayuda').text('255 carácteres restantes');
        $('#Mensaje').keyup(function () {
            var max = 255;
            var len = $(this).val().length;
            console.log(len);
            if (len > max) {
                var ch = max;
                $('#Mensaje_ayuda').text('Demasiado caracteres');// Aquí enviamos el mensaje a mostrar          
                $('#Mensaje_ayuda').addClass('text-danger');
                $('#Mensaje').addClass('is-invalid');
                $('#submit').addClass('disabled');    
                document.getElementById('submit').disabled = true;                    
            } 
            else {
                var aux = max - len;
                $('#Mensaje_ayuda').text(aux + ' carácteres restantes');
                $('#Mensaje_ayuda').removeClass('text-danger');            
                $('#Mensaje').removeClass('is-invalid');            
                $('#submit').removeClass('disabled');
                document.getElementById('submit').disabled = false;            
            }
        }); 

    </script>
@endsection