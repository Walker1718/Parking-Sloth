@extends('layouts.master')

@section('content')

<script>
    if(!usuarioJson){
        const url = "{{ url('/') }}"
        window.location.replace(url);
    }
</script>

<script>

    function clear(){
        document.getElementById('pass').style.borderColor = "#212529";
        document.getElementById('confirmPass').style.borderColor = "#212529";
        document.getElementById('actualPass').style.borderColor = "#212529";
        document.getElementById("errorActual").textContent = "";
        document.getElementById("errorConfirmacion").textContent = "";
    }
    async function updatePassword(){
        clear();

        const pass = document.getElementById('pass');
        const confirmPass = document.getElementById('confirmPass');
        const actualPass = document.getElementById('actualPass');

        let valido = true;

        if(!actualPass.value){
            const spanActual =  document.getElementById("errorActual");
            spanActual.textContent = "* Debe ingresar la contraseña actual"
            actualPass.style.borderColor  = "red";
            valido = false;
        }
        

        if(!pass.value ||  !confirmPass.value ||pass.value != confirmPass.value){
            const span =  document.getElementById("errorConfirmacion");
            span.textContent = "* Las contraseñas no coinciden"
            pass.style.borderColor  = "red";
            confirmPass.style.borderColor  = "red";
            valido = false;
        }
        
        if(valido){
            const usuarioJson = localStorage.getItem("usuario");
            const usuario = JSON.parse(usuarioJson);
            const baseUrl = "{{ url('/') }}";
            const url = `${baseUrl}/api/usuarios/${usuario.ID_Usuario}/password`;
            const response = await axios.patch(url, {
                pass: pass.value,
                confirm: confirmPass.value,
                actualPass: actualPass.value
            });
            const data = response.data;
            console.log(data);
            console.log(response);
            if(!data){
                new AWN().alert('Ha ocurrido un error, intente mas tarde');
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
  
                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="actualPass">Contraseña actual</label>
                    <input type="password" name="actualPass" id="actualPass" class="form-control form-control-lg" />
                    <span style="color: red" id="errorActual"></span>
                </div>
                
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