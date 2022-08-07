@extends('layouts.master')

@section('content')

<script>
    async function updatePassword(){
        const pass = document.getElementById('pass');
        const confirmPass = document.getElementById('confirmPass');
        if(pass.value != confirmPass.value){
            const span =  document.getElementById("errorConfirmacion");
            span.textContent = "* Las contraseñas no coinciden"
            pass.style.borderColor  = "red";
            confirmPass.style.borderColor  = "red";
        }else{
            
            const usuarioJson = localStorage.getItem("usuario");
            const usuario = JSON.parse(usuarioJson);
            const baseUrl = "{{ url('/') }}";
            const url = `${baseUrl}/api/usuarios/${usuario.ID_Usuario}/password`;
            const exito = await axios.patch(url, {
                pass: pass.value,
                confirm: confirmPass.value
            });
            if(!exito){
                new AWN().error('Ha ocurrido un error, intente mas tarde');
            }else{
                new AWN().success('Contraseña modificada con exito');
                window.location.replace(baseUrl+"/home");
            }
            
        }
    }
</script>

<section class="vh-100 gradient-custom">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="mb-md-5 mt-md-4 pb-5">
                <p class="text-white-50 mb-5">Ingrese su nueva contraseña</p>
  
                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="pass">Nueva Contraseña</label>
                    <input type="password" name="pass" id="pass" class="form-control form-control-lg" />
                    
                    
                </div>
                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="confirmPass">Confirmar Contraseña</label>
                    <input type="password" name="confirmPass" id="confirmPass" class="form-control form-control-lg" />
                    <span style="color: red" id="errorConfirmacion"></span>
                </div>
                <button class="btn btn-primary px-5" type="submit" onclick="updatePassword()">Confirmar</button>
            </div>
        </div>
      </div>
    </div>
</section>
@stop