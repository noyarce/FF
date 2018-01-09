@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class ="row">
                        <div class="col-md-8">
                            <h5 class="panel-title">
                                  <a class="btn btn-primary btn-mini" href="{!! URL::to('mantencion')!!}">Volver</a>
                            </h5>
                      </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>nombre</th>
                        <th>Fecha de Ultima Mantencion</th>
                        <th>Dias Transcurridos</th>
                        <th>Cantidad de veces en Uso</th>
                        </thead><tbody>
                            
                            @if((Session::has('flash_message')) or (count( $errors ) > 0))@include('errors.panel') @endif
                            
                        @foreach($juegos as $juego)
                            <tr>
                                <td> {!! $juego ->nombre!!}</td>
                                <td>{!! Carbon\Carbon::parse($juego->ultima_mantencion)->format('d/m/Y')!!}</td>
                                <td><?php  $hoy = \Carbon\Carbon::now();?>
                                    {!! $hoy->diffInDays(Carbon\Carbon::parse($juego->ultima_mantencion)) !!}</td>
                                <td>{!! $juego->cuenta !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection