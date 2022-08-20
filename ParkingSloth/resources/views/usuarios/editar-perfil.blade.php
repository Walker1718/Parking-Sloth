@extends('layouts.master')

@section('content')
  

<section class="vh-100 gradient-custom">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <form method="POST" action="{{url('/usuarios/'.$usuario->ID_Usuario.'/actualizar/perfil')}}" class="mb-md-5 mt-md-4 pb-5">
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
                        value="{{ $usuario->Nombre }}"
                    />
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="apellido">Apellidos</label>
                    <input 
                        type="text" 
                        name="apellido" 
                        id="apellido" 
                        class="form-control form-control-lg" 
                        value="{{ $usuario->Apellido }}"
                    />
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="email">Correo electronico</label>
                    <input 
                        type="text" 
                        name="email" 
                        id="email" 
                        class="form-control form-control-lg" 
                        value="{{ $usuario->Email }}"
                    />
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="rut">Rut</label>
                    <input 
                        type="text" 
                        name="rut" 
                        id="rut" 
                        class="form-control form-control-lg" 
                        value="{{ $usuario->Rut }}"
                    />
                </div>

                <button class="btn btn-primary px-5" type="submit">Confirmar</button>
            </form>
        </div>
      </div>
    </div>
</section>

@stop
