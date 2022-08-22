<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reportes </title>

    <link href="{{ public_path('css/pdf.css') }}" rel="stylesheet">

</head>
<body>

    <h2>Lista de Reportes</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>N°Reporte</th>
                    <th>Calle</th>
                    <th>Título de Reporte</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reportes as $reporte)
                <tr>
                        <td>{{$reporte->ID_Reporte}}</td>
                        <td>
                            @foreach ($estacionamientos as $estacionamiento)
                                
                                    @foreach ($lista_estacionamientos as $lista_estacionamiento)
                                        @if ($estacionamiento->ID_Lista == $lista_estacionamiento->ID_Lista && $estacionamiento->ID_Estacionamiento == $reporte->ID_Estacionamiento)
                                            {{$lista_estacionamiento->Nombre_Calle}} - {{$estacionamiento->Numero}}
                                        @endif 
                                    @endforeach   
                                
                            @endforeach
                        </td>   
                        <td>{{$reporte->Titulo}}</td>                      
                    </tr>
                @endforeach
            </tbody>
        </table>


</body>
</html>