
<script>
    const usuarioJson = localStorage.getItem("usuario")
    if(usuarioJson){
        const adminUrl = "{{ url('home') }}"
        window.location.replace(adminUrl);
    }

    function clean(){
      document.getElementById('email').style.borderColor  = "white";
      document.getElementById('pass').style.borderColor  = "white";
      document.getElementById('errorEmail').textContent = "";
      document.getElementById('errorPass').textContent = ""
    }
    
    async function login(){
        clean();
        const email = document.getElementById('email');
        const pass = document.getElementById('pass');
        let validado = true;
        if(!email.value){
          validado = false;
          email.style.borderColor  = "red";
          document.getElementById('errorEmail').textContent = "* Debe ingresar su correo"
        }
        if(!pass.value){
          validado = false;
          pass.style.borderColor  = "red";
          document.getElementById('errorPass').textContent = "* Debe ingresar su contraseña"
        }
        if(!validado){
          return;
        }
        
        const url = "{{ url('/api/login') }}";
        const data = {
          email: email.value,
          pass: pass.value
        }
        const res = await axios.post(url, data);
        const usuario = res.data;
        if(!usuario){
            new AWN().alert('Credenciales invalidas');
        }else{
            localStorage.setItem("usuario", JSON.stringify(usuario));
            const adminUrl = "{{ url('home') }}"
            window.location.replace(adminUrl);
        }
    }
    
</script>

<head>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
    </style>
</head>
<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body text-center" style="padding: 30px 35px 0px 35px;">
                  <div class="mb-md-5 mt-md-4">
                    
                    <h2 class="fw-bold mb-2 text-uppercase">Iniciar Sesion</h2>
                    <p class="text-white-50 mb-5">Ingrese sus credenciales por favor</p>
      
                    <div class="form-outline form-white mb-4">
                      <input type="email" placeholder="Correo electronico" name="email" id="email"  class="form-control form-control-lg" />
                      <span id="errorEmail" style="color: red"></span>
                    </div>
      
                    <div class="form-outline form-white mb-4">
                      <input type="password" placeholder="Contraseña" name="pass" id="pass" class="form-control form-control-lg" />
                      <span id="errorPass" style="color: red"></span>
                    </div>
                    <button class="btn btn-outline-light btn-lg px-5" type="submit" onclick="login()">Ingresar</button>
                  </div>
                  
                </div>
                <footer class="footer">
                  <div class="container my-auto">
                      <div class="text-center my-auto">
                          <img src="{{asset('img/logo.png')}}" alt="logo" width="65" height="65">
                          <span>Copyright &copy; Parking Sloth 2022</span>
                      </div>
                  </div>
              </footer>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>

<script src="{{ mix('js/app.js') }}" defer></script>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>