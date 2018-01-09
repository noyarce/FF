<div class="container-fluid center-block">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido  {{ Auth::user()->name }} </div>
                     <div class="panel-group" id="accordion">
        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                    <span class="glyphicon glyphicon-calendar"></span> Arriendos <span class="badge"></span>
                                </a></h4>
                            </div>
                            
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="list-group">
        <a href="{{ url('/arriendo_hoy') }}" class="list-group-item">
            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Listar Arriendos de Hoy </a>


                                </div>
                            </div>
                        </div>


                    <!--Informacion-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                        <span class="glyphicon glyphicon-knight"></span> Juegos <span class="badge"></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse">
                                <div class="list-group">
                                    <a href="{!! URL::to('/juegos')!!}"  class="list-group-item">
                                    <span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span>Ver Juegos </a>

                                    <a href="{{ url('/juegos_disponibles') }}" class="list-group-item">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>Ver Juegos Disponibles por Fecha </a>

                                    <a href="{{ url('/juegos_mantencion') }}"class="list-group-item">
                                    <span class="glyphicon glyphicon-knight" aria-hidden="true"></span>Ver Mantencion de Juegos </a>
            
                                  </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
   

