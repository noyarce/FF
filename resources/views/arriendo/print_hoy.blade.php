<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Juegos Inflables Fabiolita') }}</title>

    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Listado de Arriendos para Hoy  {{\Carbon\Carbon::now()->format('d-m-Y') }} </h4>
                  </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>ID </th>
                        <th> Hora</th>
                        <th> Dirección</th>
                        <th> Nombre del Cliente</th>
                        <th> Telefono</th>
                        <th> Comentario</th>
                        <th> Estado </th>

                        </thead>
                        @foreach($arriendos as $arriendo)
                            <tr>
                                <tbody>
                                <td>{!! $arriendo -> id!!} </td>
                                <td>{!! $arriendo -> hora!!} </td>
                                <td>{!! $arriendo -> direccion!!}</td>
                                <td>{!! $arriendo -> cliente!!} </td>
                                <td>{!! $arriendo-> fono !!}</td>
                                <td>{!! $arriendo -> comentario!!} </td>
                                <td>{!! $arriendo->estado_arriendo !!}</td>
                                </tbody>
                            </tr>
                        @endforeach
                    </table>
                    <table class="table responsive table-bordered">
                        <thead>
                        <th>Juego</th>
                        <th>Arriendo ID </th>
                        </thead>
                        @foreach($juegos as $j)
                            <tr>
                                <tbody>
                                <td>{!! $j->nombre!!} </td>
                                <td>{!! $j->arriendo_id!!} </td>
                                </tbody>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>







</body></html>
