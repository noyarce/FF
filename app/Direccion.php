<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones';
    protected $primaryKey = 'id_direccion';

    protected $fillable= array(
        'id_direccion',
        'direccion',
        'lat',
        'lng',
        'id_usuario',
    );

}
