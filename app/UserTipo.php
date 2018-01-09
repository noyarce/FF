<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTipo extends Model
{
    protected $table = 'usuarios_tipo';
    protected $primaryKey = 'id';

    protected $fillable= array(
        'tipo_usuario',
    );

}
