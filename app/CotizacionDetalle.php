<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CotizacionDetalle extends Model
{
    protected $table = 'detalle_cotizacion';

    protected $fillable= array(
                );


    public function juego_id(){
        return $this->belongsTo('App\Juego');
    }
    public function cotizacion_id()
    {
        return $this->belongsTo('App\Cotizacion');
    }

    public static function DeleteDetalle($id_c, $id_j){
        DB::table('detalle_cotizacion')
            ->select('detalle_cotizacion.*')
            ->where('detalle_cotizacion.cotizacion_id', '=', $id_c)
            ->where('detalle_cotizacion.juego_id', '=', $id_j)
            ->delete();
    }

    public static function detalle($id_cotizacion)    {
        $detalle = DB::table('juegos')
            ->select('juegos.*')
            ->join  ('detalle_cotizacion','detalle_cotizacion.juego_id','=','juegos.id')
            ->where( 'detalle_cotizacion.cotizacion_id','=', $id_cotizacion )
            ->get();
        return ($detalle);
    }



}
