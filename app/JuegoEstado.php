<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class JuegoEstado extends Model
{
    protected $table = 'juego_estado';
    protected $fillable= array(
        'juego_id',
        'estado_juego',
        'ultima_mantencion'
    );

    public function juego(){
        return $this->hasOne('App\Juego','juego_id');
    }

    public static function encontrar($id){
        $estado = DB:: table ('juego_estado')
            ->select ('juego_estado.*')
            ->where('juego_estado.juego_id', '=', $id)
            ->get();
        return $estado;
    }

    public static function estado(){
        $juegos = DB:: table ('juegos')
            ->join('juego_estado','juegos.id','=','juego_estado.juego_id')
            ->select ('juegos.*','juego_estado.*' )
            ->get();
        return $juegos;
    }

    public static function updatemantencion($id, $status){
        $date = Carbon::today();
        DB::table('juego_estado')->where('juego_id', $id)->update(['estado_juego' => $status, 'ultima_mantencion' =>$date
        ]);
    }
   
}
