@extends('layouts.master')

@section('content')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

Swal.fire({
    icon: 'warning',
    title: 'Recuerda NO utilizar la aplicación mientras conduces!',
    showConfirmButton: true,          // In case you want two scenarios 
    confirmButtonText: 'Entendido',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = '/navegarmapa';
    }
})

</script>

@stop