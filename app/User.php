<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAtribute($valor){
        if(!empty($valor)){
            $this->atributes['password']=\Hash::make($valor);
        }
    }

    public function arriendo(){
        return $this->hasMany('App\Arriendo','usuario_id');
    }

    public function mantencion(){
        return $this->hasMany('App\Mantencion','usuario_id');
    }

    public static $roles = [
        'adm' => '8',
        'sec' => '6',
        'cho' => '4',
        'mon' => '2',
        'cli' => '1',
    ];

    public static $nombre_roles = [
        'adm' => 'Administrador',
        'cli' => 'Cliente',
        'sec' => 'Secretaria',
        'cho' => 'Chofer',
        'mon' => 'Monitor',
    ];
}
