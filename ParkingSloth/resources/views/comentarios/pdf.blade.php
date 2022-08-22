<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comentarios</title>

    <link href="{{ public_path('css/pdf.css') }}" rel="stylesheet">

</head>
<body>

    <h2>Lista de Comentarios</h2>

    <table class="table">
        <thead >
            <tr>
                <th>N°Comentario</th>
                <th>Título de Reporte</th>
                <th>Calificación (1 - 5)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comentarios as $comentario)
            <tr>
                <td>{{$comentario->ID_Comentario}}</td>  
                <td>{{$comentario->Titulo}}</td>
                <td>{{$comentario->Calificacion}}  </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</body>
</html>