<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Arriendo;
use App\ArriendoDetalle;
use App\ArriendoEstado;
use App\Contacto;
use App\Mantencion;
use Illuminate\Http\Request;

class MobileController extends Controller{

    public function ind_a_mobile(){
        
         $arriendo= DB::select('select distinct a.* 
                            from arriendos a , arriendo_estado ae
                            where a.id = ae.arriendo_id  AND ae.estado_arriendo = "pendiente"');
        return response()->json($arriendo);
        
  
    }

    public function show_a_mobile(){
        $day = Carbon::today();
         $juegos= DB::select('select distinct j.nombre , a.cliente
                            from detalle_arriendo da , juegos j, arriendos a
                            where da.juego_id = j.id  AND da.arriendo_id = a.id AND a.fecha = ?', [$day]);
        return response()->json($juegos);
        
        
    }

    public function apr_a_mobile (){
        $id_a = $_POST['id_arriendo'];
        $arriendo = ArriendoEstado::estado($id_a);
        $arriendo ->estado_arriendo = 'Confirmado';
        $arriendo->save();
    }

    public function elim_a_mobile (){
        $id_a = $_POST['id_arriendo'];
        $e = 'cancelado';
        $arriendo = ArriendoEstado::estado($id_a);
        $arriendo ->estado_arriendo = $e;
        $arriendo->save();
    }



    public function index_c_mobile(){
        $ac = Contacto::orderBy('estado_contacto','DESC')->get();
        return response()->json($ac);

    }

    public function mnt_s_mobile (){
        $id_u = '0';
        $id_j = $_POST['id_juego'];
        $id_a = $_POST['comentario'];

        $mantencion = new Mantencion();
        $mantencion ->id_usuario= $id_u;
        $mantencion ->juego_id = $id_j;
        $mantencion ->comentario_mantencion = $id_a;
        $mantencion->save();
    }
    
    
    
    public function mantencion_indx(){
        $arriendo= DB::select( 
        
'(select 
    distinct j.nombre, je.estado_juego , je.ultima_mantencion ,(select COUNT(da.juego_id) from detalle_arriendo da where da.juego_id = j.id ) as  cantidad
from 
    juegos j, juego_estado je, detalle_arriendo da, arriendo_estado ae, arriendos a
where
    j.id = je.juego_id and
    a.id = da.arriendo_id and 
    j.id = da.juego_id and
    a.fecha > je.ultima_mantencion
)
UNION(
select     
    distinct j.nombre, je.estado_juego , je.ultima_mantencion , 0  as  cantidad
 from 
    juegos j, juego_estado je, detalle_arriendo da, arriendo_estado ae, arriendos a
 where 
    j.nombre not in(
                select 
                    j.nombre 
                from    
                    juegos j, juego_estado je, detalle_arriendo da, arriendo_estado ae, arriendos a
                where (
                    j.id = je.juego_id and
                    a.id = da.arriendo_id and 
                    j.id = da.juego_id and
                    a.fecha > je.ultima_mantencion
                    )
                )
)

');
        return response()->json($arriendo);
    }
    
    /*
    1
    
 
    
    
    */

    public function hoy_mobile(){
        $day = Carbon::today();
         $arriendo= DB::select('select distinct a.* 
                            from arriendos a , arriendo_estado ae
                            where a.id = ae.arriendo_id and a.fecha = ? AND ae.estado_arriendo = "confirmado"',
            [$day]);
        
        return response()->json($arriendo);
    }



}
