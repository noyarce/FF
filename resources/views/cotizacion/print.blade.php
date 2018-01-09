<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
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
<div class="container">

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Detalle Cotizacion</h3>
            </div>
            <div class ="row">
                <div class="panel-body">
                    <div class="col-md-9">
                        <h4>Informacion de la Empresa</h4>

                        <table class="table table-striped table-responsive table-bordered">
                            <tbody>
                            <tr><td> <b>Empresa </b></td><td> <b>Inflables Fabiolita, Chillán</b> </td></tr>
                            <tr><td> <b>Encargado</b> </td><td> Marcelo del Pino </td></tr>
                            <tr><td> <b>Telefono : (+569) 93208211 </b>  </td><td><b> Email : inflablesfabiolita@gmail.com </b></td></tr></tbody>
                        </table>
                    </div>
                    <div class="col-md-9">
                        <h4>Informacion del Cliente</h4>

                        <table class="table table-striped table-responsive table-bordered">
                            <tbody>
                            <tr><td> <b>Nombre del Cliente</b> </td><td> {!! $cotizacion->nombre_c!!} </td></tr>
                            <tr><td> <b>Empresa </b></td><td> {!! $cotizacion->empresa_c!!} </td></tr>
                            <tr><td> <b>Dirección </b></td><td>{!! $cotizacion -> direccion_c!!}</td></tr>
                            <tr><td> <b>Telefono :</b> {!! $cotizacion->telefono_c !!} </td><td><b> Email :</b>  {!! $cotizacion->mail_c!!} </td></tr>
                            <tr><td> <b>Fecha: </b><br> {!! $cotizacion -> fecha_c!!} </td><td> <b>Hora:</b> <br> {!! $cotizacion -> hora_c!!} </td> </tr>
                            <tr><td> <b>Comentario </b></td><td>{!! $cotizacion -> comentario_c!!} </td></tr>
                            <tr><td> <b>Facturacion </b></td><td>{!! $cotizacion -> facturacion_c!!} </td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-9"><h4>Juego(s)</h4>
                        <table class="table table-responsive table-bordered">
                            <thead>
                            <th>Juego</th>
                            <th> Precio x hasta 3 hrs</th>
                            <th> Precio x hr. Extra </th>
                            <th>horas Extra</th>
                            <th>sub total</th>
                            </thead>
                            <?php  $total = 0; $subtotal =0; $iva =0;
                            ?>
                            @foreach($detalles as $detalle)
                                <tr><tbody>
                                    <td>{!! $detalle->nombre !!}</td>
                                    <td>$ {!!$detalle->precio !!}</td>
                                    <td>$ {!! $detalle->precio_hora_extra !!}</td>
                                    <td> {!! $cotizacion->ext_c !!}</td>
                                    <td>$ {{ $st= $detalle->precio + ($detalle->precio_hora_extra * $cotizacion->ext_c) }}</td>
                                    @php $subtotal= $subtotal +$st @endphp
                                    </tbody></tr>
                            @endforeach

                        </table>
                        </div>

                    <div class="col-md-9"><h4>Total</h4>

                        <table class="table table-condensed table-responsive table-bordered" width="300" style="table-layout: fixed" >
                            <tbody>
                            <tr>
                                <td class="r">Sub total : </td>
                                <td class="r"><h4>${{$subtotal }}</h4></td>
                            </tr>
                            @if($cotizacion->facturacion_c == 'Factura')
                                @php
                                    $iva = $subtotal * 0.19;
                                @endphp
                                <tr>
                                    <td class="r">IVA :</td>
                                    <td class="r"><h4>${{$iva}}</h4></td>
                                </tr>@endif
                            <tr>@php
                                    $total = $subtotal+ $iva
                                @endphp
                                <td class="r">Total : </td>
                                <td class="r"><h4>${{$total}}</h4></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


</body></html>


