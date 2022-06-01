@extends('layouts.master')

@section('content')

<div class="" style="text-align: center;margin-top:5%">
<h1 class="text-center text-uppercase">Actualizacion Estacionamiento</h1>
</div>

<div class="" style="text-align: center">
 <span id="clock"></span>
</div>

<hr> 

		<div class="container">
			<div class="row">
				<div class="col-sm-6 ">
					<div class="info-card info-card--success">
						<div class="info-card_icon">

						<img width="100" height="100"  src="https://static.vecteezy.com/system/resources/previews/004/209/792/non_2x/traffic-light-signal-free-vector.jpg" >
						
					</div>
						<h2 class="info-card_label">Calle</h2>
						<div class="info-card_message">{{$Estacionamiento->Numero}}</div>
					</div>
				</div>
				<div class="col-sm-6 ">
					<div class="info-card info-card--warning">
						<div class="info-card_icon">

						<img width="70" height="70" src="https://media.istockphoto.com/vectors/parking-signal-vector-id504033151?b=1&amp;k=6&amp;m=504033151&amp;s=170667a&amp;w=0&amp;h=a3waZmmpz0Khe6eYBs53l4HnS8XOreRiLGulHOzhDoA=">

						</div>
						<h2 class="info-card_label">Total Estacionamiento</h2>
						<div class="info-card_message">{{$Estacionamiento->Capacidad_Total}}</div>
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







<script type="text/javascript">
var clockElement = document.getElementById('clock');

var week = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
updateTime();
function updateTime() {
    var cd = new Date();
    clockElement.innerHTML  = week[cd.getDay()];
    clockElement.innerHTML  += "<br/>";
    clockElement.innerHTML  +=  zeroPadding(cd.getDate(), 2) + '-' + zeroPadding(cd.getMonth()+1, 2) + '-' + zeroPadding(cd.getFullYear(), 4);
};

function zeroPadding(num, digit) {
    var zero = '';
    for(var i = 0; i < digit; i++) {
        zero += '0';
    }
    return (zero + num).slice(-digit);
}
</script>

<script>
let myInput = document.getElementById("my-input");
function stepper(btn) {
	let id = btn.getAttribute("id");
	let min = myInput.getAttribute("min");
	let max = myInput.getAttribute("max");
	let step = myInput.getAttribute("step");
	let val = myInput.getAttribute("value");
	let calcStep = id == "increment" ? step * 1 : step * -1;
	let newValue = parseInt(val) + calcStep;

    console.log(id,min,max,step,val);

	if (newValue >= min && newValue <= max) {
		myInput.setAttribute("value", newValue);
	}
}
</script>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
$('#decrement').on('click', function() {
var name = $('#my-input').val();
if(name!=""){
    $.ajax({
      url: 'updateEstacionamiento',
      type: 'post',
	  data: {
        "_token": "{{ csrf_token() }}",
        "id": 1,
		"name": name
        },
      success: function(response){
        alert(response);
      }
    });

	}
	else{
		alert('Please fill all the field !');
	}
});
});

$(document).ready(function() {
$('#increment').on('click', function() {
var name = $('#my-input').val();
if(name!=""){
    $.ajax({
      url: 'updateEstacionamiento',
      type: 'post',
	  data: {
        "_token": "{{ csrf_token() }}",
        "id": 1,
		"name": name
        },
      success: function(response){
        alert(response);
      }
    });

	}
	else{
		alert('Please fill all the field !');
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
    width: 225px;
	border-radius: 45px;
	background-color: #ffffff;
	box-shadow: 0 20px 30px rgba(0, 0, 0, 0.15);
}
input[type="number"] {
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
.buttoninde {
	color: #3264fe;
	font-size: 40px;
	border: none;
	background-color: #ffffff;
	cursor: pointer;
	outline: none;
}
#decrement {
	padding: 15px 5px 15px 25px;
	border-radius: 45px 0 0 45px;
}
#increment {
	padding: 15px 25px 15px 5px;
	border-radius: 0 45px 45px 0;
}


/*ccs de cartas*/ 
.main-content {
	padding-top: 100px;
	padding-bottom: 100px;
}

.info-card {
	background: #fff;
	text-align: center;
	margin-bottom: 30px;
	border-radius: 3px;	
	box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}
.info-card .info-card_icon {
	height: 125px;
	width: 125px;
	margin: 0 auto 0px auto;
	display: flex;
	justify-content: center;
	align-items: center;
	position: relative;
}
.info-card .info-card_icon i {
	font-size: 50px;
	color: #4caf50;
}
.info-card .info-card_icon .info-card_img-icon {
	height: 60px;
	width: 60px;
	object-fit: contain;
}
.info-card .info-card_label {
	margin-bottom: 15px;
}
.info-card .info-card_message {
	margin-bottom: 15px;
}
.info-card .btn {
	background: #03a9f4;
	border-color: #03a9f4;
	box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
}
.info-card--success .info-card_icon {
	border-color: #4caf50;
}
.info-card--success .info-card_icon i {
	color: #4caf50;
}
.info-card--danger .info-card_icon {
	border-color: #f44336;
}
.info-card--danger .info-card_icon i {
	color: #f44336;
}
.info-card--warning .info-card_icon {
	border-color: #ff9800;
}
.info-card--warning .info-card_icon i {
	color: #ff9800;
}
</style>

@endsection