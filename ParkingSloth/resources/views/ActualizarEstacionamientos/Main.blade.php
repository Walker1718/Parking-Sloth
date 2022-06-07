@extends('layouts.master')

@section('content')

<div class="" style="text-align: center;margin-top:5%">
	<h1 class="text-center text-uppercase">Actualizacion Estacionamiento</h1> 
</div>

<div class="" style="text-align: center">
	<span id="reloj"></span>
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






<script type="text/javascript">
var reloj = document.getElementById('reloj');
var semana = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
updateTime(); // se agrega todo lo hecho en funcion en variable reloj

function updateTime() {
    var cd = new Date();
    reloj.innerHTML  = semana[cd.getDay()]; 	//dia segun arreglo [0-6]
    reloj.innerHTML  += "<br/>"; 				// salto de linea
    reloj.innerHTML  +=  agregarceros(cd.getDate(), 2) + '-'    // dia agrega 0 para fecha 06/06/0006 
						+ agregarceros(cd.getMonth()+1, 2) + '-' // mes
						+ agregarceros(cd.getFullYear(), 4);		// año
};

function agregarceros(fecha, digito) { // lo que hace es sumar 00 + 6 = 006 y de lo cual solo rescatamos los ultimos 06
    var cero = '';
    for(var i = 0; i < digito; i++) {
        cero += '0';
    }
    return (cero + fecha).slice(-digito); // hace la funciond e "recortar" los ultimos valores segun el digito
}
</script>

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

<script>
// BOTON DE QUITAR
$(document).ready(function() {
	$('#decrement').on('click', function() { // Pendiente de accion del id decrement
		var Cantidad = $('#my-input').val(); // llama a my-input que es la numeracion que se modifica
		if(Cantidad!=""){
    		$.ajax({ // ocupo ajax para update de la base ed datos
      			url: 'updateEstacionamiento', // llamo a la funcion updateEstacionamiento en el controller de estacionamiento
      			type: 'post', // por metodo post
	  			data: { // lo que mandare
        			"_token": "{{ csrf_token() }}", // un token
        			"id": {{$Estacionamiento->ID_Estacionamiento}}, //un id de la calle-
					"Cantidad": Cantidad // y la cantidad total de estacionamientos que se modifico
        		},
      			success: function(response){ // si se realizo mandar mensaje
        		alert('quitado correctamente');
      			}
    		});
		}else{
			alert('Intentalo denuevo'); // si no se realizo que intente deneuvo
		}
	});
});

// BOTON DE AREGAR
$(document).ready(function() { // lo mismo a lo ed arriba 
	$('#increment').on('click', function() {
		var Cantidad = $('#my-input').val();
		if(Cantidad!=""){
    		$.ajax({
      			url: 'updateEstacionamiento',
      			type: 'post',
	  			data: {
        			"_token": "{{ csrf_token() }}",
        			"id": {{$Estacionamiento->ID_Estacionamiento}},
					"Cantidad": Cantidad
        		},
      			success: function(response){
        		alert('Agregado correctamente');
      			}
    		});
		}else{
			alert('Intentalo denuevo');
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

@endsection