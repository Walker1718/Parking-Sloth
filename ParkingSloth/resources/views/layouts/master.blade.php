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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/home')}}">
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

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/reportes/create') }}">
                    <i class="fas fa-fw fa-bug"></i>
                    <span>Reporta un Error</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/comentarios/create') }}">
                    <i class="fas fa-fw fa-comment"></i>
                    <span>Calificanos</span></a>
            </li>

            

            <div class="sidebar-heading">
                Mod
            </div>

            <!-- AARON ACTUALIZAR ESTACIONAMIENOT --------->
            <li class="nav-item">
                <a class="nav-link" id='ID_Usuario' href="../ActualizarEstacionamientos">
                <i class="fas fa-fw fa-cog"></i>
                    <span>Actualizar Estacionamientos</span></a>
            </li>
            <!-- AARON ACTUALIZAR ESTACIONAMIENOT --------->

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

            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ url('/asignar_estacionamientos/create') }}"> 
                    <i class="fas fa-users"></i>
                    <span>Asignar estacionamiento</span>
                </a>
            </li> --}}


            {{-- FOO --}}



            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3"
                    aria-expanded="true" aria-controls="collapse3">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Soporte</span>
                </a>
                <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ url('/reportes/') }}" >Lista Reportes</a>
                        <a class="collapse-item" href="{{ url('/comentarios/') }}" >Lista Comentarios</a>
                    </div>
                </div>
            </li>
              

            <!-- Divider AARON---------------------------->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/ImportDataSet') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Importacion de datos</span></a>
            </li>
            <!--AARON---------------------------->

            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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
                                <a class="dropdown-item" id="btnVerPerfil" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="{{ url('/usuarios/modificarContraseña') }}">
                                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cambiar Contraseña
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" onclick="logout()">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('libs/sbadmin/js/sb-admin-2.min.js')}}"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
    <script>
        const usuarioJson = localStorage.getItem("usuario");
        if(usuarioJson){
            const usuario = JSON.parse(usuarioJson);
            const span = document.getElementById('username');
            span.textContent =`${usuario.Nombre} ${usuario.Apellido}`;
            const btnVerPerfil = document.getElementById("btnVerPerfil");
            const base = "{{ url('/') }}"
            const url = `${base}/usuarios/${usuario.ID_Usuario}/perfil`;
            btnVerPerfil.setAttribute("href", url);
            //-- AARON ACTUALIZAR ESTACIONAMIENOT --------->
            const ID_Usuario = document.getElementById('ID_Usuario');
            ID_Usuario.setAttribute('href', '/ActualizarEstacionamientos/'+`${usuario.ID_Usuario}`);
             //-- AARON ACTUALIZAR ESTACIONAMIENOT --------->
        }else{
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


    </script>
    @yield('scripts')

</body>

</html>