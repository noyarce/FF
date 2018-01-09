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
                    
                    {!!Form::model($estado,['route'=>['arriendo_estado', $estado->arriendo_id],'method'=> 'PUT'])  !!}
                    {!!Form::select('estado_arriendo', ['Pendiente' => 'Pendiente', 'Confirmado' => 'Confirmado', 'Cancelado' => 'Cancelado'], $estado->estado_arriendo)!!}
                    {!!Form::submit('Finalizar',['class'=>'btn btn-default','type'=>'submit']) !!}
                    {!! Form::close() !!}
                   
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
                            
                    </div>
                </div>
            </div>
        </div>
    </div>

    

@endsection


