@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Listado de Imagenes

                        <a href="{{url('fotos/create')}}" class="btn-xs btn-primary pull-right" role="button">Agregar</a>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            @foreach($fotos as $foto)
                                <div class="col-sm-6 col-md-4">
                                    {!! Form::open(['action' => ['ThumbnailController@destroy', $foto->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Eliminar', ['class'=>'btn btn-xs btn-danger','onclick'=>'return confirm("Seguro que desea eliminar?");']) !!}
                                    {!! Form::close() !!}
                                    <div class="thumbnail">
                                        <img src="storage/{{$foto->imagen}}" alt="{{$foto->nombre}}">
                                        <div class="caption">
                                            <h3>{{$foto->nombre}}</h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection