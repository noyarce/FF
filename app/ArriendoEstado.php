<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ArriendoEstado extends Model
{
    protected $table = 'arriendo_estado';
    protected $fillable= array(
        'arriendo_id',
        'estado_arriendo',
    );


    public function arriendo_id()
    {
        return $this->hasOne('App\Arriendo');
    }

    public static function estado($id){
        $estado = DB::table('arriendo_estado')
            ->select('arriendo_estado.*')
            ->where ('arriendo_estado.arriendo_id','=',$id)
            ->first();
        return $estado;
    }

    public static function updateEstado($id, $status){
                DB::table('arriendo_estado')->where('arriendo_id', $id)->update(['estado_arriendo' => $status]);
    }


    public static function DeleteEstado($id_a){
        DB::table('arriendo_estado')
            ->select('arriendo_estado.*')
            ->where('arriendo_estado.arriendo_id', '=', $id_a)
            ->delete();
    }
}
