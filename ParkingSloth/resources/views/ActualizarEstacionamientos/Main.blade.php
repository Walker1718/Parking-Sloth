@extends('layouts.master')

@section('content')

<div class="" style="text-align: center;margin-top:5%">
	<h1 class="text-center text-uppercase">Actualizacion Estacionamiento</h1> 
	<h6 class="text-center text-uppercase">{{$Estacionamiento->Nombre}} {{$Estacionamiento->Apellido}}</h6> 
</div>

<div class="" style="text-align: center">

	{{$dias}}
		<br> 
	{{$Fecha_Inversa}}

</div>

<hr> 
		<div class="container">
			<div class="row">
				<div class="col-sm-6 ">
					<div class="info-card">
						<div class="info-card_icon">
							<img width="100" height="100"  src="https://static.vecteezy.com/system/resources/previews/004/209/792/non_2x/traffic-light-signal-free-vector.jpg" >
						</div>
							<h2>Calle</h2>
						<div>
							<h4 style ="font-weight: 900">{{$Estacionamiento->Nombre_Calle}} {{$Estacionamiento->Numero}}</h4>
						</div>
					</div>
				</div>
				<div class="col-sm-6 ">
					<div class="info-card">
						<div class="info-card_icon">
							<img width="70" height="70" src="https://media.istockphoto.com/vectors/parking-signal-vector-id504033151?b=1&amp;k=6&amp;m=504033151&amp;s=170667a&amp;w=0&amp;h=a3waZmmpz0Khe6eYBs53l4HnS8XOreRiLGulHOzhDoA=">
						</div>
							<h2 class=>Total Estacionamiento</h2>
						<div class=>
							<h4  style ="font-weight: 900">{{$Estacionamiento->Capacidad_Total}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
<hr> 

<div class="" style="text-align: center">
	<h1 >Actualizar</h5>
	<h6 >"Cantidad Actual de autos estacionados"</h6>
</div>


<div class="center">
	<div class="containerR">
		<button id="decrement" onclick="stepper(this)" class = "buttoninde">-</button>
		<!-- You can change these values below-->
		<input type="number" id="my-input" min="-0" max="{{$Estacionamiento->Capacidad_Total}}" value="{{$Estacionamiento->Capacidad_Utilizada}}" step="1" readonly>
		<button id="increment" onclick="stepper(this)" class = "buttoninde">+</button>
	</div>
</div>
<br> 
<br> 

<script>
let myInput = document.getElementById("my-input"); // mi variable input (numeracion de 0 a cantidad de estacionamiento)
function stepper(btn) {
	let id = btn.getAttribute("id");
	let min = myInput.getAttribute("min");
	let max = myInput.getAttribute("max");
	let step = myInput.getAttribute("step");
	let val = myInput.getAttribute("value");
	let calcStep = id == "increment" ? step * 1 : step * -1;
	let newValue = parseInt(val) + calcStep;

	if (newValue >= min && newValue <= max) {
		myInput.setAttribute("value", newValue);
	}
}
</script>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
// BOTON DE QUITAR
$(document).ready(function() {
	$('#decrement').on('click', function() { // Pendiente de accion del id decrement
		var Cantidad = $('#my-input').val(); // llama a my-input que es la numeracion que se modifica

		//location.reload(); // refresca la pagina

		if(Cantidad == 0 && 0 == "{{$Estacionamiento->Capacidad_Utilizada}}"){ // si esta en el minimo o maximo
			Swal.fire({
  					icon: 'warning',
  					title: 'Supera el minimo ',
					}).then(function(){ 
   					location.reload();});
			return;
		}
		
		if(Cantidad!=""){
    		$.ajax({ // ocupo ajax para update de la base ed datos
      			url: '/updateEstacionamiento', // llamo a la funcion updateEstacionamiento en el controller de estacionamiento
      			type: 'post', // por metodo post
	  			data: { // lo que mandare
        			"_token": "{{ csrf_token() }}", // un token
        			"id": {{$Estacionamiento->ID_Estacionamiento}}, //un id de la calle-
					"Cantidad": Cantidad // y la cantidad total de estacionamientos que se modifico
        		},
      			success: function(response){ // si se realizo mandar mensaje
					Swal.fire({
  					icon: 'success',
  					title: 'Quitado correctamente',
					}).then(function(){ 
   					location.reload();});
      			}
    		});
		}else{
			Swal.fire({
  					icon: 'error',
  					title: 'Intentalo denuevo',
					}).then(function(){ 
   					location.reload();});
		}

	});
});

// BOTON DE AREGAR
$(document).ready(function() { // lo mismo a lo ed arriba 
	$('#increment').on('click', function() {
		var Cantidad = $('#my-input').val();

		//location.reload();

		if(Cantidad == "{{$Estacionamiento->Capacidad_Total}}" && "{{$Estacionamiento->Capacidad_Total}}" == "{{$Estacionamiento->Capacidad_Utilizada}}"){ 
			Swal.fire({
  					icon: 'warning',
  					title: 'Supera el maximo ',
					}).then(function(){ 
   					location.reload();});
			return;
		}
		
		if(Cantidad!=""){
    		$.ajax({
      			url: '/updateEstacionamiento',
      			type: 'post',
	  			data: {
        			"_token": "{{ csrf_token() }}",
        			"id": {{$Estacionamiento->ID_Estacionamiento}},
					"Cantidad": Cantidad
        		},
      			success: function(response){
					Swal.fire({
  					icon: 'success',
  					title: 'Agregado Correctamente',
					}).then(function(){ 
   					location.reload();});
      			}
    		});
		}else{
			Swal.fire({
  					icon: 'error',
  					title: 'Intentalo denuevo',
					}).then(function(){ 
   					location.reload();});
		}
	});
});
</script>




<style type="text/css">
	
/*ccs de +number-*/ 
.center{
  display: flex;
  justify-content: center;
  align-items: center;
}
.containerR { 
	border-radius: 45px;
	background-color: #ffffff;
	box-shadow: 0 20px 30px rgba(0, 0, 0, 0.15);
}
input[type="number"] {/*Css number medio*/ 
	-moz-appearance: textfield;
	text-align: center;
	font-size: 40px;
	border: none;
	outline: none;
	background-color: #ffffff;
	color: #202030;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
	-webkit-appearance: none;
	margin: 0;
}
.buttoninde { /*Css bptones*/ 
	color: #3264fe;
	font-size: 40px;
	border: none;
	background-color: #ffffff;
	cursor: pointer;
	outline: none;
}
#decrement { /*Css boton derecho*/ 
	padding: 15px 5px 15px 25px;
	border-radius: 45px 0 0 45px;
}
#increment { /*Css boton izquierdo*/ 
	padding: 15px 25px 15px 5px;
	border-radius: 0 45px 45px 0;
}


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

<script>
if({{$Estacionamiento->TurnoAsistencia}} == false){ //SI NO PRESENTO ASITENCIA MOSTRAR MODAL
	Swal.fire(
    {
        title: "Turno", 
        text: "Tienes que activar tu turno para poder utilizar esta vista.", 
        icon: "warning",
        showConfirmButton: true,          // In case you want two scenarios 
        confirmButtonText: 'Activar turno',
        showDenyButton: true,        // In case you want two scenarios 
        denyButtonText:'No activar turno',
		allowOutsideClick: false  // apretar click solo en modal
    }
	).then(function (result) {
    	if (result.isConfirmed) {
			$.ajax({  // llamar al controlador y cambiar turno en base de datos
		  		url: '/ActualizarTurnoAsistencia',
		  		type: 'post',
		  		data: {
					"_token": "{{ csrf_token() }}",
					"ID_Estacionamiento": {{$Estacionamiento->ID_Estacionamiento}},
					"ID_Usuario": {{$Estacionamiento->ID_Usuario}},
					"TurnoAsistencia": true,
			},
			success: function(response){
					Swal.fire({
  					icon: 'success',
  					title: 'Turno activo',
					}).then(function(){ 
   					location.reload();});
      				}
			});	
	
    	} else if (result.isDenied) {
        window.location.href = "{{url('/home')}}";
    	}
	});
}
</script>

<!-- 

<style>
/*STYLE MODAL https://codepen.io/mburnette/pen/LxNxNg                                       ABAJO TODO MODAL TURNO ASISTENCIA*/
input[type=checkbox]{
	height: 0;
	width: 0;
	visibility: hidden;
}

.switchlabel {
	cursor: pointer;
	text-indent: -9999px;
	width: 200px;
	height: 100px;
	background: #ff9295;
	display: block;
	border-radius: 100px;
	position: relative;
}

.switchlabel:after {
	content: '';
	position: absolute;
	top: 5px;
	left: 5px;
	width: 90px;
	height: 90px;
	background: #fff;
	border-radius: 90px;
	transition: 0.3s;
}

input:checked + .switchlabel {
	background: #6fc57c;
}

input:checked + .switchlabel:after {
	left: calc(100% - 5px);
	transform: translateX(-100%);
}

.switchlabel:active:after {
	width: 130px;
}


.centering {
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
}

</style>

	$( document ).ready(function() { $('#myModal').modal('toggle')}); //ACTIVA AL PRINCIPIO

$(document).on('click', '#GuardarTurno', function () {    //si hace click en guardar el turnoi
	var TurnoAsistencia = document.getElementById("switch").checked; // ver variable de checkbox
	if(TurnoAsistencia!=""){
	$.ajax({  // llamar al controlador y cambiar turno en base de datos
		  url: '/ActualizarTurnoAsistencia',
		  type: 'post',
		  data: {
			"_token": "{{ csrf_token() }}",
			"ID_Estacionamiento": {{$Estacionamiento->ID_Estacionamiento}},
			"ID_Usuario": {{$Estacionamiento->ID_Usuario}},
			"TurnoAsistencia": TurnoAsistencia,
		},
		success: function(response){
			alert('Agregado correctamente');
			$('#myModal').modal('hide'); // si es correcto se ceirra el modal
		  }
	});	
	}else{alert('No estaras habilitado hasta que actives tu asistencia al turno');}
});


$(document).on('click', '#switch', function () {  // si se hace click en switch cambiar text
	if(document.getElementById("switch").checked  == true){
		document.getElementById("p1").innerHTML = "Turno Activo";
	}else{
		document.getElementById("p1").innerHTML = "Turno Inactivo";
	}
});

}
</script>


<div id="myModal" class="modal hide" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header " style="text-align: center;">
		<h4 class="modal-title">Activar turno</h4>
      </div>
	  
      <div class="modal-body centering">
	  <input type="checkbox" id="switch" /><label for="switch" class="switchlabel">Toggle</label>
	  <br>
	  <p id="p1">Turno Inactivo</p>
      </div>


      <div class="modal-footer">
        <button type="button" id="GuardarTurno" class="btn btn-primary">Guardar turno</button>
      </div>
    </div>
  </div>
</div>
-->
@endsection