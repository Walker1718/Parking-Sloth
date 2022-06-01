@extends('layouts.master')

@section('content')

<div class="" style="text-align: center;margin-top:5%">
 <span id="clock"></span>
</div>
<div class="center">
	<div class="containerR">
		<button id="decrement" onclick="stepper(this)" class = "buttoninde">-</button>
		<!-- You can change these values below-->
		<input type="number" id="my-input" min="-0" max="100" value="0" step="1" readonly>
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


<style type="text/css">

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

</style>

@endsection