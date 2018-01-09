@extends('layouts.app')
@section('content')

    <style>
        #map {
            margin: auto auto;
            width:80%;
            height: 500px;

        }

        .controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 300px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #type-selector label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        .celda{
            height: auto;
            width: 200px;
        }

        .trans{
            width: 400px;
            display: flex;
            justify-content: center;
        }


    </style>

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                    <div class="panel-heading"> Arrendar Juego(s) - Información del Cliente</div>
                        {!! Form::model($arriendo,['route'=>['arriendo.update',$arriendo->id],'method'=>'PUT']) !!}
                        <div class="panel-body">
                        @if((Session::has('flash_message')) or (count( $errors ) > 0))@include('errors.panel') @endif
                        <div class="form-group">

                    {!!Form::hidden  ('id_usuario',$arriendo->id_usuario )!!}


                        <table class="table table-bordered">
                            <thead>
                            </thead><tbody>
                            <tr>
                                <td>{!! Form::label('Nombre', 'Nombre',['class'=>'col-sm-0 control-label']) !!} </td>
                                <td>{!! Form::text('cliente', null,['class'=>'form-control']) !!}</td>
                            </tr> <tr>
                                <td>{!! Form::label('Telefono de Contacto', 'Telefono de Contacto',['class'=>'col-sm-0 control-label']) !!}</td>
                                <td>{!! Form::text('fono', null,['class'=>'form-control']) !!}</td>
                            </tr>
                                <tr>
                                    <td>{!! Form::label('Fecha', 'Fecha',['class'=>'col-sm-2 control-label']) !!}</td>
                                    <td>{!! Form::date('fecha', $arriendo->fecha) !!}</td>
                                </tr>

                                <tr>
                                    <td>{!! Form::label('hora', 'hora',['class'=>'col-sm-2 control-label']) !!}</td>
                                    <td>   {!!  Form::select('hora', [
                            '8:30 - 11:30'=>'8:30 - 11:30',
                            '9:00 - 12:00'=>'9:00 - 12:00',
                            '9:30 - 12:30'=>'9:30 - 12:30',
                            '10:00 - 13:00'=>'10:00 - 13:00',
                            '10:30 - 13:30'=>'10:30 - 13:30',
                            '11:00 - 14:00'=>'11:00 - 14:00',
                            '11:30 - 14:30'=>'11:30 - 14:30',
                            '12:00 - 15:00'=>'12:00 - 15:00',
                            '12:30 - 15:30'=>'12:30 - 15:30',
                            '13:00 - 16:00'=>'13:00 - 16:00',
                            '13:30 - 16:30'=>'13:30 - 16:30',
                            '14:00 - 17:00'=>'14:00 - 17:00',
                            '14:30 - 17:30'=>'14:30 - 17:30',
                            '15:00 - 18:00'=>'15:00 - 18:00',
                            '15:30 - 18:30'=>'15:30 - 18:30',
                            '16:00 - 19:00'=>'16:00 - 19:00',
                            '16:30 - 19:30'=>'16:30 - 19:30',
                            '17:00 - 20:00'=>'17:00 - 20:00',
                            '17:30 - 20:30'=>'17:30 - 20:30',
                            '18:00 - 21:00'=>'18:00 - 21:00',
                            '18:30 - 21:30'=>'18:30 - 21:30',
                            '19:00 - 22:00'=>'19:00 - 22:00',
                            '19:30 - 22:30'=>'19:30 - 22:30',
                            '20:00 - 23:00'=>'20:00 - 23:00',
                            '20:30 - 23:30'=>'20:30 - 23:30',
                            '21:00 - 00:00'=>'21:00 - 00:00',
                            '21:30 - 00:30'=>'21:30 - 00:30',
                            '22:00 - 01:00'=>'22:00 - 01:00',
                            '22:30 - 01:30'=>'22:30 - 01:30',
                            '23:00 - 02:00'=>'23:00 - 02:00',
                            '23:30 - 02:30'=>'23:30 - 02:30',
                            '00:00 - 03:00'=>'00:00 - 03:00',
                            ], null, ['placeholder' => $arriendo->hora])!!}</td>
                                </tr>

                                <tr>
                                    <td>{!! Form::label('hrs extra', 'hrs extra',['class'=>'col-sm-2 control-label']) !!}</td>
                                    <td>{!! Form::selectRange('ext', 0, 5, 0,['class'=>'col-sm-3  form-control'], $arriendo->ext) !!}</td>
                                </tr>

                                <tr>
                                    <td>{!! Form::label('Medio de Pago', 'Medio de Pago',['class'=>'col-sm-0 control-label']) !!}</td>
                                    <td>{!!  Form::select('mdp', ['Efectivo'=>'Efectivo','Deposito'=>'Deposito','Transferencia electronica'=>'Transferencia electronica','Cheque'=>'Cheque'], 'Efectivo')!!}</td>
                                </tr>

                                <tr>
                                <td>{!! Form::label('Facturacion', 'Facturacion',['class'=>'col-sm-0 control-label']) !!}</td>
                                <td> <select name="facturacion" id="facturacion">
                                        <option value="Boleta">Boleta</option>
                                        <option value="Factura">Factura</option>
                                        <option value="Vale ">Vale</option>
                                    </select></td>
                            </tr>


                                <tr>
                                    <td>{!! Form::label('Comentario', 'Comentario',['class'=>'col-sm-2 control-label']) !!} 
                                    Use este espacio para indicar cualquier mensaje que estime conveniente 
                                    </td>
                                    <td> <div class=" rows=3 ">
                                            {!! Form::textarea('comentario', null,['class'=>'form-control'], $arriendo->comentario) !!}
                                        </div></td>
                                </tr>

                                <tr>
                                    <td>{!! Form::label('Dirección', 'Dirección',['class'=>'col-sm-2 control-label']) !!}</td>
                                    <td>{!! Form::text('direccion', null,['class'=>'form-control'], $arriendo->direccion) !!}</td>
                                </tr>

                            <tr>
                               <td class="celda"> Porfavor Permita que la pagina pueda usar su ubicacion para poder encontrar su direccion de forma mas expedita,
                               En caso contrario utilice el buscador y mueva el marcador para mejorar la precision. Gracias
                               </td>
                                <td>
                                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                <div id="map">
                                </div>
                                 <input type ="text" name="lat" id ="lat" value="-36.60664" readonly>
                                    <input type ="text" name="lng" id ="lng" value="-72.104" readonly>
                                </td>
                            </tr>
                                <tr>
                                    <td>{!! Form::label('Importante', 'Importante',['class'=>'col-sm-2 control-label']) !!}</td>
                                    <td> Para Confirmar o cancelar su arriendo porfavor indiquenos mediante via telefonica con anticipación. </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <div class="trans">
                            {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
                            {!! Form::close() !!}
                            <button class="btn btn-danger">Cancelar</button>
                        </div>
                    </div>
              </div>
        </div>
    </div>
</div>

    <script>
        function initMap() {
            var chillan = new google.maps.LatLng(parseFloat({{$arriendo->lat}}),parseFloat({{$arriendo->lng}}));

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: chillan
            });

            var marker = new google.maps.Marker({
                position: chillan,
                map: map,
                draggable: true
            });

            marker.addListener ('dragend', function (event) {
                document.getElementById("lat").value = this.getPosition().lat();
                document.getElementById("lng").value = this.getPosition().lng();
            });

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    marker.setPosition(pos);
                    map.setCenter(pos);
                    document.getElementById("lat").value =position.coords.latitude;
                    document.getElementById("lng").value = position.coords.longitude;

                }, function() {
                    handleLocationError(true, marker, map.getCenter());
                });
            } else {
                handleLocationError(false, marker, map.getCenter());
            }

            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
                var bounds = new google.maps.LatLngBounds();

                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    marker.setPosition(place.geometry.location);
                    document.getElementById("lat").value = place.geometry.location.lat();
                    document.getElementById("lng").value = place.geometry.location.lng();
                    map.setCenter(place.geometry.location);
                    if (place.geometry.viewport) {
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

        function handleLocationError(browserHasGeolocation, marker, pos) {
            marker.setPosition(pos);
            marker.setContent(browserHasGeolocation ?
                    'Error: The Geolocation service failed.' :
                    'Error: Your browser doesn\'t support geolocation.');
        }




    </script>
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyCsWBoq7NdO9jsx2kis8ZPP8RmhnnX8gD0&libraries=places&callback=initMap"></script>
@endsection