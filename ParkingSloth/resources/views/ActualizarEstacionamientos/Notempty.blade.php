@extends('layouts.master')

@section('content')

<div class="" style="text-align: center;margin-top:5%">
	<h1 class="text-center text-uppercase">Actualizacion Estacionamiento</h1> 
</div>

<div class="" style="text-align: center">
	<span id="reloj"></span>
</div>

<hr> 

<div class="" style="text-align: center;margin-top:5%">
	<h1 class="text-center text-uppercase">No tienes estacionamientos asignados</h1> 
</div>	

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
</style>

@endsection