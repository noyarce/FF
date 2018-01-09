@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Listado Cotizaciones </h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>

                        <th> Fecha</th>
                        <th> Nombre</th>
                        <th> Empresa</th>
                        <th> e-mail</th>
                        <th> telefono</th>
                        <th> direccion</th>
                        <th> comentario</th>
                        </thead>
                        @foreach($cotizaciones as $cotizacion)
                            <tr>
                                <tbody>
                                <td>{!! $cotizacion ->fecha_c!!} </td>
                                <td>{!! $cotizacion ->nombre_c!!} </td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="{!! URL::to('cotizacion/'.$cotizacion->id_cotizacion) !!}">Ver</a>
                                </td>
                                </tbody>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection