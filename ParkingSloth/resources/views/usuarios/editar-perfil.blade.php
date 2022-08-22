@extends('layouts.master')

@section('content')
  
<script>
    //si el usuario necesita estar logeado
    if(!usuarioJson){
        const url = "{{ url('/') }}"
        window.location.replace(url);
    }
</script>

<section class="vh-100 gradient-custom">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <form id="form-editar-perfil" method="POST" class="mb-md-5 mt-md-4 pb-5">
                @method("PATCH")
                @csrf
                <p class="text-white-50 mb-5">Actualice sus datos personales</p>
  
                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="nombre">Nombres</label>
                    <input 
                        type="text" 
                        name="nombre" 
                        id="nombre" 
                        class="form-control form-control-lg" 
                    />
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="apellido">Apellidos</label>
                    <input 
                        type="text" 
                        name="apellido" 
                        id="apellido" 
                        class="form-control form-control-lg" 
                    />
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="email">Correo electronico</label>
                    <input 
                        type="text" 
                        name="email" 
                        id="email" 
                        class="form-control form-control-lg" 
                    />
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="rut">Rut</label>
                    <input 
                        type="text" 
                        name="rut" 
                        id="rut" 
                        class="form-control form-control-lg" 
                    />
                </div>

                <button class="btn btn-primary px-5" type="submit">Confirmar</button>
            </form>
        </div>
      </div>
    </div>
</section>


<script>
    const usuario = JSON.parse(usuarioJson);
    const form = document.getElementById("form-editar-perfil");
    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById("apellido");
    const email = document.getElementById("email");
    const rut = document.getElementById("rut");

    const baseUrl = "{{url('/usuarios')}}/";
    form.action = baseUrl + usuario.ID_Usuario + "/actualizar/perfil";

    nombre.value = usuario.Nombre;
    apellido.value = usuario.Apellido;
    email.value = usuario.Email;
    rut.value = usuario.Rut;

</script>
    
@stop
