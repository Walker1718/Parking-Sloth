@extends('layouts.master')

@section('content')

<form action="{{url('/comentarios')}}" method="post" enctype="multipart/form-data">
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
                        <h3 class="card-title">Califícanos</h3>
                        <p>Califíca tu experienca con la aplicación</p>
                    </div>
                    <div class="card-body" style="display: block;">

                        <div class="form-group">
                            <label for="Titulo">{{'Título'}}</label>
                            <input type="text" name="Titulo" id="Titulo" value="" maxlength="64"
                                class="form-control {{$errors->has('Titulo')?'is-invalid':''}}">

                            {!! $errors->first('Titulo','<div class="invalid-feedback"> :message</div>') !!}
                        </div>

                        <div class="form-group">
                            <label for="Mensaje">{{'Comentario'}}</label>
                            {{-- <textarea name="Mensaje" id="Mensaje"
                                class="form-control {{$errors->has('Mensaje')?'is-invalid':''}}" rows="4"></textarea> --}}

                            <textarea id="Mensaje" name="Mensaje" class="form-control {{$errors->has('Mensaje')?'is-invalid':''}}" 
                                aria-label="With textarea" maxlength="256"></textarea>
                              <span class="help-block">
                                <p id="Mensaje_ayuda" class="help-block">Mensaje de alerta</p>
                              </span>

                            {!! $errors->first('Mensaje','<div class="invalid-feedback"> :message</div>') !!}
                        </div>

                        <div class="form-group">
                            <label for="Calificacion">{{'Calificacion'}}</label>
                            <span class="fa fa-star" onclick="calificar(this)" style="cursor: pointer; color:orange;"
                                id="1estrella"></span>
                            <span class="fa fa-star" onclick="calificar(this)" style="cursor: pointer;"
                                id="2estrella"></span>
                            <span class="fa fa-star" onclick="calificar(this)" style="cursor: pointer;"
                                id="3estrella"></span>
                            <span class="fa fa-star" onclick="calificar(this)" style="cursor: pointer;"
                                id="4estrella"></span>
                            <span class="fa fa-star" onclick="calificar(this)" style="cursor: pointer;"
                                id="5estrella"></span>
                        </div>

                        <div class="form-group">

                            <input type="number" id="Calificacion" name="Calificacion" min="1" max="5" value="1"
                                class="form-control" hidden>

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
    var cont;
    function calificar(item){
        //console.log(item);
        cont = item.id[0];

        for(let i=0; i<5 ; i++){
            if(i<cont){
                document.getElementById((i+1)+'estrella').style.color="orange";
            }else{
                document.getElementById((i+1)+'estrella').style.color="black";
            }
        }

        document.getElementById("Calificacion").value = cont;
    }
</script>

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