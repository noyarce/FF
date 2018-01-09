<div class="container-fluid center-block">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido  {{ Auth::user()->name }} </div>
                     <div class="panel-group" id="accordion">
        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                    <span class="glyphicon glyphicon-user"></span> Usuarios <span class="badge"></span>
                                </a>
                                </h4>
                            </div>
                            <!--Usuarios -->
                            <div id="collapse1" class="panel-collapse collapse">
                            <div class="list-group">
                                <a href="{{ url('/usuarios') }}" class="list-group-item" >
                                  <span class="glyphicon glyphicon-user"></span> Listar Usuarios <span class="badge"></span>
                                </a>
                             
                            </div>
                            </div>
                        </div>
                        <!--Juegos-->
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                    <span class="glyphicon glyphicon-calendar"></span> Juegos <span class="badge"></span>
                                </a></h4>
                            </div>
                            
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="list-group">
        <a href="{{ url('/juegos_disponibles') }}" class="list-group-item"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Ver Juegos Disponibles por Fecha </a>   
        <a href="{{ url('/juegos_administrar') }}" class="list-group-item"><span class="glyphicon glyphicon-knight" aria-hidden="true"></span>Ver Mantencion de Juegos </a>   
        <a href="{{ url('/solicitudes_mantencion') }}" class="list-group-item"><span class="glyphicon glyphicon-knight" aria-hidden="true"></span>Ver Solicitudes Mantencion</a>   
        <a href="{{ url('/juegos/create') }}" class="list-group-item"><span class="glyphicon glyphicon-knight" aria-hidden="true"></span>Registrar Juego </a>  


                                </div>
                            </div>
                        </div>









                        <!--Viajes-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                                        <span class="glyphicon glyphicon-send"></span> Arriendos <span class="badge"></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse">
                                                              <div class="list-group">
                                                                    <a href="{{ url('/arrendar') }}" class="list-group-item" >
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> Arrendar </a>   
                                
                                                                  
                                             <a href="{!! URL::to('/arriendo')!!}" class="list-group-item" >
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Listar Todos Los Arriendos </a>   

          <a href="{{ url('/arriendo_hoy') }}" class="list-group-item">
            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Listar Arriendos de Hoy </a>   

          <a href="{{ url('/arriendo_fecha') }}" class="list-group-item">
            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Listar Arriendos segun Fecha </a>   

          <a href="{{ url('/arriendo_pendientes') }}" class="list-group-item" >
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> Listar Arriendos Pendientes </a>   
            
                                </div>
                            </div>
                        </div>

                        <!--Blog 
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                    <span class="glyphicon glyphicon-pencil"></span> Blog <span class="badge"></span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="list-group">
                                
                                
                            </div>
                        </div>
                        </div>
                        -->
                        <!--Mensajes -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                    <span class="glyphicon glyphicon-envelope"></span> Mensajes <span class="badge"></span></a>
                                </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="list-group">
                                <a href="{{ url('/contacto') }}" class="list-group-item">
                                    <span class="glyphicon glyphicon-envelope"></span> Leer Mensajes <span class="badge"></span></a>
                            </div>
                        </div>
                        </div>

                        <!--Informacion-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                        <span class="glyphicon glyphicon-picture"></span> Fotos <span class="badge"></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse">
                                <div class="list-group">
                                   <a href="{{ url('/fotos') }}" class="list-group-item">
                                     <span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Listar Fotos </a>   
                                     <a href="{{ url('/fotos/create') }}" class="list-group-item">
                                     <span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Agregar Fotos </a>  
                                </div>
                            </div>
                        </div>


                    </div>

            </div>
        </div>
    </div>
</div>
   
   
   
    