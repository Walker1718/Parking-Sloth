@extends('layouts.master')

@section('content')
<div class="" style="text-align: center;margin-top:5%">
	<h1 class="text-center text-uppercase">Importacion de datos</h1> 
    <hr>
</div>



	<div class="container">
		<div class="row">
			<div class="col-sm-6 ">
				<div class="info-card">
						<div class="info-card_icon">
							<img width="100" height="100"  src="https://images.vexels.com/media/users/3/207320/isolated/preview/947f1b71a0930515b16e30cebecb7460-trazo-de-icono-colorido-de-poste-indicador.png" >
						</div>

                    <div class="card">
                        <div class="card-header"><h3> Importar Excel de estacionamientos a guardar</h3></div>
                            <div class="card-body">
                                <ul>
                                <li type="disc"> <h6 class="card-subtitle mb-2 text-muted"> El formato de Excel tiene que cumplir una tabla con la siguiente designacion: Calle, Cuadra y Automoviles</h6></li>
                                <li type="disc"> <h6 class="card-subtitle mb-2 text-muted"> Si existen datos duplicados solo se mantendra el ya existente en la base de datos</h6></li>
                                </ul>             
                                <form action="/ImportDataSet/import" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group">
                                            <input type="file" name="file" />
                                            <button type="submit" class="btn btn-primary">Importar Excel</button>
                                        </div>
                                </form>              
                            </div>
                        </div>
                    </div>
		        </div>

			<div class="col-sm-6 ">
				<div class="info-card">
					    <div class="info-card_icon">
							<img width="100" height="100" src="https://cdn-icons-png.flaticon.com/512/1198/1198293.png">
						</div>

                    <div class="card">
                        <div class="card-header"><h3> Importar Excel de moderadores a guardar</h3></div>
                            <div class="card-body">
                                <ul>                                                                                                                                                
                                <li type="disc"> <h6 class="card-subtitle mb-2 text-muted"> El formato de Excel tiene que cumplir una tabla con la siguiente designacion: nombre, apellido, rut y correo</h6></li>
                                <li type="disc"> <h6 class="card-subtitle mb-2 text-muted"> Si existen datos duplicados solo se mantendra el ya existente en la base de datos</h6></li>
                                </ul>
                                <form action="/ImportDataSet/userimport" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group">
                                            <input type="file" name="file" />
                                            <button type="submit" class="btn btn-primary">Importar Excel</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>

				</div>
			</div>
		</div>
	</div>

    @if ( isset($errors) && $errors->any())
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                $variable = {!!$errors!!};
                $text = "";
                for ($index = 1; $index <= $variable[0][0]; $index++) {
                 $text = $text + $variable[$index][0] + "\n";
                }
            Swal.fire({
  					icon: 'error',
  					title: 'Error',
                    text: $text
					})
        </script>

        <style type="text/css">
            .swal2-html-container, .swal2-text{
             color: red !important;
        }
        </style>
    @else
        @if (session('status'))
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
  					icon: 'success',
  					title: 'Correcto',
                    text: 'Datos agregados correctamente'
					})
            </script>

        @endif
    @endif


    <style type="text/css">
    /*ccs de cartas*/ 
    .info-card {
        background: #fff;
        text-align: center;
        margin-bottom: 30px;
        border-radius: 3px;	
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); /*sombreado*/
    }
    .info-card_icon {
        height: 125px;
        width: 125px;
        margin: 0 auto 0px auto;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }
    </style>
    

@endsection