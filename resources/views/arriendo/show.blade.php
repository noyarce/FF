@extends('layouts.app')
@section('content')
    <style>
        #map {
            margin: auto auto;
            width:80%;
            height: 500px;
        }
    </style>
    <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Detalle de Arriendo ID : {!! $arriendo->id !!}</h3>
                    <a href="{!! URL::to('arriendo/'.$arriendo->id.'/imprimir')!!}" class="btn btn-success btn-lg active" aria-label="Left Align"role="button" onclick="this.disabled=true">
                        <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>Guardar como PDF </a>
                </div>
                    <div class ="row">
                        <div class="panel-body">
                            <h3>Informacion del Cliente</h3>
                            <table class="table table-striped table-condensed table-responsive table-bordered">
                                <tbody>
                                <tr><td> Nombre del Cliente : <b>{!! $arriendo -> cliente!!}</b>  </td><td> Telefono : <b>{!! $arriendo->fono !!}</b></td></tr>
                                <tr><td> Horario : <b>{!! $arriendo -> hora!!}</b> </td><td>Estado : <b>{!! $estado ->estado_arriendo!!}</b></td></tr>
                                <tr><td> Dirección : <b>{!! $arriendo -> direccion!!}</b></td><td></td></tr>
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
                                    <tbody><?php  $total = 0; $subtotal =0; $iva =0;
                                    ?>
                                 @foreach($detalles as $detalle)
                                     <tr>
                                     <td>{!! $detalle->nombre !!}</td>
                                     <td>$ {!!$detalle->precio !!}</td>
                                     <td>$ {!! $detalle->precio_hora_extra !!}</td>
                                     <td> {!! $arriendo->ext !!}</td>
                                     <td>$ {{ $st= $detalle->precio + ($detalle->precio_hora_extra * $arriendo->ext) }}</td>
                                     @php $subtotal= $subtotal +$st @endphp
                                     </tr>
                                 @endforeach
                                    </tbody>
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

                            <div id="map">

                            </div>
                            {{$arriendo->lat}}
                            {{$arriendo->lng}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function initMap() {
            var myLatlng = new google.maps.LatLng(parseFloat({{$arriendo->lat}}),parseFloat({{$arriendo->lng}}));

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15 ,
                center: myLatlng
            });
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                draggable: false
            });
        }
    </script>
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyCsWBoq7NdO9jsx2kis8ZPP8RmhnnX8gD0&libraries=places&callback=initMap"></script>



@endsection


