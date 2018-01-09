<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = 'cotizacion';
    protected $primaryKey = 'id';

    protected $fillable= array(
        'id_usuario',
        'fecha_c',
        'hora_c',
        'ext_c',
        'telefono_c',
        'nombre_c',
        'empresa_c',
        'mail_c',
        'mdp_c',
        'facturacion_c',
        'comentario_c',
        'direccion_c'
    );
    public function id_usuario(){
        return $this->belongsTo('App\Users');
    }

}


