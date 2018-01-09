@extends('layouts.app')
@section('content')
    <style>
        #map {
            height: 500px;
            width: 600px;
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

        .pac-container {
            font-family: Roboto;
        }

        #type-selector {
            color: #fff;
            background-color: #4d90fe;
            padding: 5px 11px 0px 11px;
        }

        #type-selector label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }
        #target {
            width: 345px;
        }
    </style>

    <div class="row">
        <div class="col-md-9">
            {!! $detalle->direccion !!}
            <div class="row">
                <div class="col-md-6">
                    <input id="lat" name="lat" type="hidden" value={!! $detalle->lat!!}>
                    <input id="lng" name="lng" type="hidden" value={!! $detalle->lng!!}>

{!! $detalle->lat !!}
{!! $detalle->lng !!}


                <div id="map"> </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function initMap() {
            var lat = document.getElementById('lat');
            var lng = document.getElementById('lng');
            var pos = {lat: lat, lng: lng};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: pos
            });
            var marker = new google.maps.Marker({
                map: map,
                position: pos,
                draggable: true
            });
             marker.setPosition(pos);
             map.setCenter(pos);
       }
    </script>

<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyCsWBoq7NdO9jsx2kis8ZPP8RmhnnX8gD0&libraries=places&callback=initMap"></script>



@endsection
