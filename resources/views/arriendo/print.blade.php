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


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Detalle de Arriendo ID : {!! $arriendo->id !!}</h3>
                </div>
                    <div class ="row">
                        <div class="panel-body">
                            <h3>Informacion del Cliente</h3>
                            <table class="table table-striped table-condensed table-responsive table-bordered">
                                <tbody>
                                <tr><td> Nombre del Cliente : <b>{!! $arriendo -> cliente!!}</b>  </td><td> Telefono : <b>{!! $arriendo->fono !!}</b></td></tr>
                                <tr><td> Horario : <b>{!! $arriendo -> hora!!}</b> </td><td>Estado : <b>{!! $estado ->estado_arriendo!!}</b></td></tr>
                                <tr><td> Dirección : </td><td>{!! $arriendo -> direccion!!} </td></tr>
                                <tr><td> Facturacion : <b>{!! $arriendo-> facturacion!!}</b>
                                    <td> Medio de Pago : <b>{!! $arriendo-> mdp!!}</b>
                                    </td></tr>
                                <tr><td> Comentario </td><td>{!! $arriendo -> comentario!!} </td></tr>
                                </tbody>
                                </table>
                            <h3>Juego(s)</h3>
                            <table class="table table-striped table-bordered">
                                 <thead>
                                 <th>Juego</th>
                                 <th> Precio x hasta 3 hrs</th>
                                 <th> Precio x hr. Extra </th>
                                 <th>horas Extra </th>
                                 <th>sub total</th>
                                 </thead>
                                 <?php  $total = 0; $subtotal =0; $iva =0;?>
                                 @foreach($detalles as $detalle)
                                     <tr><tbody>
                                    <td>{!! $detalle->nombre !!}</td>
                                     <td>$ {!!$detalle->precio !!}</td>
                                     <td>$ {!! $detalle->precio_hora_extra !!}</td>
                                     <td> {!! $arriendo->ext !!}</td>
                                     <td>$ {{ $st= $detalle->precio + ($detalle->precio_hora_extra * $arriendo->ext) }}</td>
                                     @php $subtotal= $subtotal +$st @endphp
                                         </tbody> </tr>
                                 @endforeach

                            </table>

                            <table class="table table-condensed table-responsive table-bordered" width="300" style="table-layout: fixed" >
                                <tbody>
                                <tr>
                                    <td class="r">Sub total : </td>
                                    <td class="r"><h4>${{$subtotal }}</h4></td>
                                </tr>
                                @if($arriendo->facturacion == 'Factura')
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
                            <div>Archivo para uso interno de la Empresa - NO valido como boleta</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body></html>