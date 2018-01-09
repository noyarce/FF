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

                        <!--Viajes-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                                        <span class="glyphicon glyphicon-flag"></span> Arriendos <span class="badge"></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse">
                                <div class="list-group">
                                    
                                      <a href="{{ url('/arrendar') }}" class="list-group-item" >
            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Arrendar </a>   
                                
                                             <a href="{!! URL::to('/arriendo')!!}" class="list-group-item" >
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Listar Todos Los Arriendos </a>   

          <a href="{{ url('/arriendo_hoy') }}" class="list-group-item">
            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Listar Arriendos de Hoy </a>   

          <a href="{{ url('/arriendo_fecha') }}" class="list-group-item">
            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Listar Arriendos segun Fecha </a>   

          <a href="{{ url('/arriendo_pendientes') }}" class="list-group-item" >
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Listar Arriendos Pendientes </a>   
            
            
            
            
                                </div>
                            </div>
                        </div>

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

                        
                    </div>

            </div>
        </div>
    </div>
</div>
   
