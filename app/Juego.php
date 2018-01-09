<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Juego extends Model
{
    protected $table = 'juegos';
    protected $primaryKey = 'id';
    protected $fillable= array(
        'nombre',
        'j_largo',
        'j_ancho',
        'j_alto',
        'precio',
        'precio_hora_extra'
    );


    public function arriendo_detalle(){
        return $this->hasMany('App\ArriendoDetalle','juego_id');
    }
    public function cotizacion_detalle(){
        return $this->hasMany('App\CotizacionDetalle','juego_id');
    }
    public function juego_estado(){
        return $this->hasMany('App\JuegoEstado','juego_id');
    }
    public function mantencion(){
        return $this->hasMany('App\Mantencion','juego_id');
    }

    public static function estado(){
        $juegos = DB:: table ('juegos')
            ->join('juego_estado','juegos.id','=','juego_estado.juego_id')
            ->select ('juegos.*','juego_estado.*' )
            ->get();
        return $juegos;
    }

    public static function disp($fecha){
        $juegos = DB:: table('arriendos')
    ->join('detalle_arriendo', 'arriendos.id_arriendo', '=', 'detalle_arriendo.id_arriendo')
    ->Join('juegos', 'detalle_arriendo.id_juego','=' ,'juegos.id_juego')
    ->where ('detalle_arriendo.id_juego','=','juegos.id_juego')

            ->select ('juegos.*')
            ->distinct()
            ->get();

        return $juegos;
    }

    public static function ocupado($id){
    $juego = DB::select('select  je.estado_juego
                            from juegos j , juego_estado je
                            where j.id = je.juego_id AND 
                            je.estado_juego = "disponible" AND
                            j.id = ?',[$id]);
    return $juego;
}

    public static function dispo($fecha){
        $juegos = DB:: table ('arriendos')
            ->where( 'arriendos.fecha','=',$fecha)
            ->join('detalle_arriendo', 'arriendos.id_arriendo', '=', 'detalle_arriendo.id_arriendo')
            ->Join('juegos', 'detalle_arriendo.id_juego','!=','juegos.id_juego')
            ->join('juego_estado','juegos.id_juego','=','juego_estado.juego_id')
            ->where('juego_estado.estado_juego','=','disponible')
            ->select ('juegos.*')
            ->get();
        return $juegos;
    }

}
