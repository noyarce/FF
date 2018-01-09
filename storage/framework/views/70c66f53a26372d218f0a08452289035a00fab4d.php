<?php $__env->startSection('content'); ?>


    <div class="container">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <a class="btn btn-warning" href="<?php echo e(url('/home')); ?>"> Volver</a>                  
                        </div>
                    <div class="panel-body">
<?php if((Session::has('flash_message')) or (count( $errors ) > 0)): ?><?php echo $__env->make('errors.panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>
                    <table class="table">
                        <thead>
                        <th>Nombre</th>
                        <th>Rol </th>
                         <th>Editar Rol</th>
                         <th>Ver Detalles</th>
                       
                        <th>Editar Usuario</th>
                        <th>Eliminar</th>
                        </thead>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                            <tbody>
                            <td><?php echo e($user->name); ?></td>
                            <td>
                 <?php if($user-> tipo_usuario == '1'): ?> <b>Administrador</b> <?php endif; ?>
                 <?php if($user-> tipo_usuario == '2'): ?> <b>Secretaria</b> <?php endif; ?>
                 <?php if($user-> tipo_usuario == '3'): ?> <b>Chofer</b> <?php endif; ?>
                 <?php if($user-> tipo_usuario == '4'): ?> <b>Monitor</b><?php endif; ?>
                 <?php if($user-> tipo_usuario == '5'): ?> <b>Cliente</b><?php endif; ?>
                                
                            </td>
                            <td>
                            <a class="btn btn-primary" href="<?php echo URL::to('rol/'.$user->id); ?>"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar Rol</a>
                                </td>
                             <td>
                            <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('<?php echo e($user-> id); ?>')"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Ver Detalles</button>
                            </td>
                            
                            
                            <td>
                            <a class="btn btn-warning" href="<?php echo URL::to('usuarios/'.$user->id); ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar usuario</a>
                                </td>
                            <td><?php echo Form::open(['route'=>['usuarios.destroy',$user->id],'method'=>'DELETE']); ?>

                                <?php echo Form::submit('Eliminar Usuario',['class'=>'btn btn-danger']); ?>

                                <?php echo Form::close(); ?></td>
                            </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </table>
<?php echo e($users->links()); ?>

                </div>
        </div>
    </div>
    </div>
    </div>
    
    

    <input type="hidden" name="hidden_view" id="hidden_view" value="<?php echo e(url('user_show')); ?>">

    <div class="modal fade" id="viewModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><p><span id="name" class="text-success"></span></p>
                    </h4>
                </div>
                <div class="modal-body">
                    <p><b>Email </b><span id="email" class="text-success"></span></p>
                    <p><b>Tipo de Usuario </b><span id="tipo_usuario" class="text-success"></span></p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"></button>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

        function fun_view(id){
            var view_url = $("#hidden_view").val();
            $.ajax({
                url: view_url,
                type:"GET",
                data: {"id":id},
                success: function(result){
                    //console.log(result);
                    $("#name").text(result.name);
                    $("#email").text(result.email);
                    if(result.tipo_usuario == '1'){
                        $("#tipo_usuario").text('Administrador');
                    }
                    if(result.tipo_usuario == '2'){
                        $("#tipo_usuario").text('Secretaria');
                    }
                        if(result.tipo_usuario == '3'){
                    $("#tipo_usuario").text('Chofer');
                    }
                        if(result.tipo_usuario == '4'){
                    $("#tipo_usuario").text('Monitor');
                    }
                        if(result.tipo_usuario =='5'){
                    $("#tipo_usuario").text('Cliente');
                    }                                                           
                }
            });
        }


</script>

    
    
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>