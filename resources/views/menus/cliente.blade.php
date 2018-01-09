<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading"> Bienvenido/a {{ Auth::user()->name }} </div>
                <div class="panel-body">


  <nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">

      <li>
        <a href="{!! URL::to('/arrendar')!!}" >
            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Arrendar </a>
        </li><li>
        <a href="{!! URL::to('cotizar')!!}">
            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>Cotizar </a>
        </li><li>
        <a href="{!! URL::to('/nuestros_juegos')!!}">
            <span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span>Ver Juegos </a>
        </li><li>
        <a href="{!! URL::to('/contactar')!!}" >
            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Contactarnos </a>
      
      
      </li>
      <li> <a href="{!! URL::to('/mis_arriendos')!!}">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Mis Arriendos </a></li>
      
      </ul>
    </div>
  </div>
</nav>


                </div>
            </div>
        </div>
    </div>
</div>


    


