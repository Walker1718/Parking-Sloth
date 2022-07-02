@extends('layouts.master')

@section('content')

<div class="" style="text-align: center;margin-top:5%">
	<h1 class="text-center text-uppercase">Actualizacion Estacionamiento</h1> 
</div>

<div class="" style="text-align: center">

	{{$dias}}
		<br> 
	{{$Fecha_Inversa}}

</div>

<hr> 

<div class="" style="text-align: center;margin-top:5%">
	<h1 class="text-center text-uppercase">No tienes estacionamientos asignados</h1> 
</div>	

@endsection