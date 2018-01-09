<?php

namespace App;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Mantencion extends Model
{
    protected $table = 'mantencion';
    protected $primaryKey = 'id';

    protected $fillable= array(
        'comentario_mantencion',
        'juego_id',
        'user_id'
        );
    public function user_id(){
        return $this->belongsTo('App\Users','id');
    }

    public function juego_id(){
        return $this->belongsTo('App\Juego','id');
    }

    public static function listar(){
        $solicitudes = DB:: table ('juegos')
            ->join('mantencion','juegos.id','=','mantencion.juego_id')
            ->select ('juegos.*','mantencion.*' )
            ->get();
        return $solicitudes;
    }
    
     public static function show_detalle($id){
        $juego= DB::select('select  j.* , je.*, COUNT(da.juego_id) as cuenta   
                            from juegos j, detalle_arriendo da , juego_estado je, arriendos a   
                            where j.id = ?
                            and j.id = da.juego_id   
                            and j.id = je.juego_id
                            and a.id = da.arriendo_id
                            and a.fecha >= je.ultima_mantencion 
                            group by j.id 
                            ',[$id]);
        return $juego;
    }

    
}
