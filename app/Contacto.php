<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{

    protected $table = 'contactos';
    protected $primaryKey = 'id';

    protected $fillable= array(
        'tipo_contacto',
        'mensaje_contacto',
        'estado_contacto',
        'id_usuario',
        'nombre_contacto',
        'telefono_contacto',
        'mail_contacto',
    );

}
