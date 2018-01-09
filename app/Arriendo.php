<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Arriendo extends Model
{
    protected $table = 'arriendos';
    protected $primaryKey = 'id';

    protected $fillable= array(
        'fecha',
        'hora',
        'lat',
        'lng',
        'direccion',
        'comentario',
        'ext',
        'cliente',
        'fono',
        'mdp'
    );

    public function arriendo_detalle(){
        return $this->hasMany('App\ArriendoDetalle', 'arriendo_id');
    }

    public function arriendo_estado(){
        return $this->hasOne('App\ArriendoEstado','arriendo_id');
    }

    public function id_usuario(){
        return $this->belongsTo('App\User');
    }


    public static function hoy(){
        $day = Carbon::today();
        $arriendos = DB:: table('arriendos')
            ->where ('arriendos.fecha','=',$day)
            ->join ('arriendo_estado', 'arriendo_estado.arriendo_id', '=', 'arriendos.id')
            ->select('arriendos.*', 'arriendo_estado.*')
            ->distinct()->get();
        return $arriendos;
    }

    public static function mis(){
        $user = Auth::user()->id;
        $arriendos = DB:: table('arriendos')
            ->where ('arriendos.id_usuario','=',$user)
            ->join ('arriendo_estado', 'arriendo_estado.arriendo_id', '=', 'arriendos.id')
            ->select('arriendos.*', 'arriendo_estado.*')
            ->distinct()->get();
        return $arriendos;
    }

    public static function juegosHoy(){
        $day = Carbon::today();
        $arriendos = DB:: table('detalle_arriendo')
            ->join('arriendos','arriendos.id', '=','detalle_arriendo.arriendo_id')
            ->join('juegos','juegos.id','=','detalle_arriendo.juego_id')
            ->where ('arriendos.fecha','=',$day)
            ->select('juegos.*', 'arriendos.id as arriendo_id')
            ->distinct()->get();
        return $arriendos;
    }


    public static function fechas($day){
        $arriendos = DB:: table('arriendos')
            ->where ('arriendos.fecha','=',$day)
            ->select('arriendos.*')
            ->distinct()->get();
        return $arriendos;
    }



    public static function fechar($date){
        $arriendos = DB:: table('arriendos')
            ->join ('arriendo_estado', 'arriendo_estado.id_arriendo', '=', 'arriendos.id_arriendo')
            ->where ('arriendos.fecha','=',$date)
            ->select('arriendos.*' , 'arriendo_estado.*')
            ->distinct()->get();
        return $arriendos;
    }

    public static function pend(){
        $arriendos = DB:: table('arriendos')
            ->select ('arriendos.*')
            ->join ('arriendo_estado', 'arriendo_estado.arriendo_id', '=', 'arriendos.id')
            ->where('arriendo_estado.estado_arriendo', '=', 'pendiente')
            ->distinct()->get();
        return $arriendos;
    }



}
