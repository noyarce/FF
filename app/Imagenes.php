<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model{

    protected $table = 'img';
    protected $primaryKey = 'id';
    protected $fillable= array(
        'imagen',
        'nombre'
        );
}
