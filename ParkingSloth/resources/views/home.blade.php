@extends('layouts.master')

@section('content')

<div class="card" style="width: 28rem;">
    <div class="card-body">
        <h5 class="card-title"><i class="fas fa-exclamation-triangle"></i> Advertencia!</h5>
        <p class="card-text">Recuerda NO utilizar la aplicación mientras conduces!</p>
        <a href="{{ url('/navegarmapa/') }}" class="btn btn-primary">Entendido</a>
    </div>
</div>

@stop