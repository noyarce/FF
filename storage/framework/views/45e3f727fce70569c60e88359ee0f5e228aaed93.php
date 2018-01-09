<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Inflables Fabiolita')); ?></title>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">


        <!-- Styles -->
        <style>
             body {
                background-image: url('../public/img/fondo.jpg');
                 font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-family: Papyrus, fantasy;
                font-size: 84px;
                color: #000000;

            }

            .links > a {
                color: #000000;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                    <?php if(Auth::guest()): ?>
                        <a href="<?php echo e(url('/login')); ?>">Iniciar Sesion</a>
                        <a href="<?php echo e(url('/register')); ?>">Registrarse</a>
                    <?php else: ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">

                                    <a href="<?php echo e(url('/logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                    </form>
                            </ul>
                    <?php endif; ?>
                </div>

            <div class="content">
                <div class="title m-b-md">
                    Inflables Fabiolita
                </div>
                <div class="links">
                    <a href=<?php echo URL::to('juegos'); ?>>Juegos</a>
                    <a href=<?php echo URL::to('contactar'); ?>>Contacto</a>
                    <a href=<?php echo URL::to('cotizar'); ?>>Cotizar</a>
                    <a href=<?php echo URL::to('arrendar'); ?>>Arrendar</a>
                </div>
            </div>
        </div>
    </body>
</html>
