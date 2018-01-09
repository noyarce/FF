<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ArriendoDetalle extends Model
{
    protected $table = 'detalle_arriendo';
    protected $fillable = array(
        'arriendo_id',
        'juego_id',
    );


    public function arriendo_id(){
        return $this->belongsTo('App\Arriendo', 'arriendo_id');
    }

    public function juego_id(){
        return $this->belongsTo('App\Juego', 'juego_id');
    }


    /**
     * @return array
     */
    public static function getAll($id_arriendo)
    {
        $detalle = DB::table('detalle_arriendo')
            ->select('detalle_arriendo.*')
            ->where('detalle_arriendo.arriendo_id', '=', $id_arriendo)
            ->get();
        return $detalle;
    }

    public static function DeleteDetalle($id_a, $id_j){
        DB::table('detalle_arriendo')
            ->select('detalle_arriendo.*')
            ->where('detalle_arriendo.arriendo_id', '=', $id_a)
            ->where('detalle_arriendo.juego_id', '=', $id_j)
            ->delete();
        }

    public static function detalle($id){
        $detalle = DB::table('juegos')
            ->select('juegos.*')
            ->join('detalle_arriendo', 'detalle_arriendo.juego_id', '=', 'juegos.id')
            ->where('detalle_arriendo.arriendo_id', '=', $id)
            ->distinct()
            ->get();
        return ($detalle);
    }
}