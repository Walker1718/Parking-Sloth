<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Parking Sloth</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('libs/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('libs/sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script>
        const usuarioJson = localStorage.getItem("usuario");
    </script>

    @yield('head')
    <style>
       .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: white;
            text-align: center;
        }

    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/home')}}" id='Home'>
                <div class="sidebar-brand-icon">
                    <img src="{{asset('img/logo.png')}}" alt="logo" width="65" height="65">
                </div>
                <div class="sidebar-brand-text mx-3">Parking Sloth</div>
            </a>


            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Usuario
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/navegarmapa/') }}">
                    <i class="fas fa-fw fa-map"></i>
                    <span>Navegar Mapa</span>
                </a>
            </li>

            <div id="OcultarModerador"> <!--AARON---------------------OCULTAR MODERADOR------->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/reportes/create') }}">
                    <i class="fas fa-fw fa-bug"></i>
                    <span>Reporta un error</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/comentarios/create') }}">
                    <i class="fas fa-fw fa-comment"></i>
                    <span>Califícanos</span></a>
            </li>

            </div> <!--AARON---------------------OCULTAR MODERADOR------->
            <div id="OcultarUsuarioComun"> <!--AARON---------------------Ocultar Usuario Comun------->

            <div class="sidebar-heading">
                Mod
            </div>

            <!-- AARON ACTUALIZAR ESTACIONAMIENOT --------->
            <li class="nav-item">
                <a class="nav-link" id='ID_Usuario' href="../ActualizarEstacionamientos">
                <i class="fas fa-fw fa-cog"></i>
                    <span>Actualizar Estacionamientos</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" id='IndexModerador' href="../IndexModerador">
                <i class="fas fa-fw fa-cog"></i>
                    <span>Lista asignada</span></a>
            </li>
            <!-- AARON ACTUALIZAR ESTACIONAMIENOT --------->

            
            <div id="OcultarModerador2"> <!--AARON---------------------OCULTAR MODERADOR------->
            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/usuarios/') }}">
                    <i class="fas fa-users"></i>
                    <span>Usuarios</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->

            {{-- FOO --}}
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Estacionamientos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Estacionamientos</h6>
                        <a class="collapse-item" href="{{ url('/estacionamientos/') }}">Lista estacionamientos</a>
                        <a class="collapse-item" href="{{ url('/estacionamientos/create') }}">Crear estacionamientos</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Asignacion de est.</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Asignacion de est.</h6>
                        <a class="collapse-item" href="{{ url('/asignar_estacionamientos') }}">Lista est. asignados</a>
                        <a class="collapse-item" href="{{ url('/asignar_estacionamientos/create') }}">Asignar estacionamiento</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3"
                    aria-expanded="true" aria-controls="collapse3">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Reportes/Comentarios</span>
                </a>
                <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Listas</h6>
                        <a class="collapse-item" href="{{ url('/reportes/') }}" >Reportes</a>
                        <a class="collapse-item" href="{{ url('/comentarios/') }}" >Comentarios</a>
                    </div>
                </div>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ url('/asignar_estacionamientos/create') }}"> 
                    <i class="fas fa-users"></i>
                    <span>Asignar estacionamiento</span>
                </a>
            </li> --}}


            {{-- FOO --}}



            <li class="nav-item">
                <a class="nav-link" href="{{ url('/ImportDataSet') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Importacion de datos</span></a>
            </li>
            
            </div> <!--AARON---------------------OCULTAR MODERADOR------->
            </div> <!--AARON---------------------Ocultar Usuario Comun------->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" id='username'>Usuario</span>
                                <i class="fas fa-user-circle" style="font-size: 36px; color:black"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" id="btnVerPerfil" href="{{ url('/usuarios/editar/perfil') }}">
                                    <i class="fas fa-user-edit fa-sm fa-fw mr-2 text-black-400"></i>
                                    Editar Perfil
                                </a>
                                <a class="dropdown-item" href="{{ url('/usuarios/modificarContraseña') }}">
                                    <i class="fas fa-key fa-sm fa-fw mr-2 text-black-400"></i>
                                    Cambiar Contraseña
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" onclick="logout()">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-black-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div style="margin-inline: 20px">

                    @yield('content')
                </div>

            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="footer">
                <div class="container my-auto">
                    <div class="text-center my-auto">
                        <span>Copyright &copy; Parking Sloth 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('libs/sbadmin/js/sb-admin-2.min.js')}}"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
    <script>
        
        if(usuarioJson){
            const usuario = JSON.parse(usuarioJson);
            //-- AARON OCULTARMODERADOR --------->
            const rol = usuario.ID_Rol;
            //-- AARON OCULTARMODERADOR --------->
            const span = document.getElementById('username');
            span.textContent =`${usuario.Nombre} ${usuario.Apellido}`;
            //-- AARON ACTUALIZAR ESTACIONAMIENOT --------->
            const ID_Usuario = document.getElementById('ID_Usuario');
            ID_Usuario.setAttribute('href', '/ActualizarEstacionamientos/'+`${usuario.ID_Usuario}`);
            const IndexModerador = document.getElementById('IndexModerador');
            IndexModerador.setAttribute('href', '/IndexModerador/'+`${usuario.ID_Usuario}`);
            //-- AARON ACTUALIZAR ESTACIONAMIENOT --------->
            //-- AARON OCULTARMODERADOR --------->
            if(rol == 2){
                $("#OcultarModerador").hide();
                $("#OcultarModerador2").hide();

                const ID_Usuario = document.getElementById('Home');
                ID_Usuario.setAttribute('href', '/ActualizarEstacionamientos/'+`${usuario.ID_Usuario}`);
            }
            //-- AARON OCULTARMODERADOR --------->
        }else{
            //-- AARON OcultarUsuarioComun --------->
            $("#OcultarUsuarioComun").hide();
            $("#OcultarUsuarioComun2").hide();
            document.getElementById('username').innerText = "Login";
            document.getElementById('userDropdown').setAttribute('href', '/login');
            //-- AARON OcultarUsuarioComun --------->
            const dropdown = document.getElementById('userDropdown');
            dropdown.disabled = true;
            //TODO: descomentar cuando sea necesario que el usuario tenga sesion abierta
            //logout();
        }

        function logout(){
            localStorage.removeItem('usuario');
            const loginUrl = "{{ url('/') }}"
            window.location.replace(loginUrl);
        }

        async function actualizarUsuarioMemoria(){
            if(!usuarioJson){
                return;
            }
            const usuario = JSON.parse(usuarioJson);
            const url = "{{ url('/api/usuarios') }}/"+usuario.ID_Usuario;
            axios.get(url).then( response => {
                const nuevoUsuario = response.data;
                if(!nuevoUsuario.Activo){
                    logout();
                    return;
                }
                localStorage.setItem("usuario", JSON.stringify(nuevoUsuario));
                const span = document.getElementById('username');
                span.textContent =`${nuevoUsuario.Nombre} ${nuevoUsuario.Apellido}`;
                return response;
            }).catch( error => {
                console.error(error);
            })
        }

        $(async function() {
           await actualizarUsuarioMemoria();
        });

    </script>
    @yield('scripts')

</body>

</html>