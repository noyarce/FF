<?php

namespace App\Http\Controllers;

use App\Cotizacion;
use App\CotizacionDetalle;
use Illuminate\Http\request;
use App\Http\Requests\CotizacionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CotizacionController extends Controller
{
    public function index(){
        $cotizaciones = Cotizacion::paginate(20);
        return view('cotizacion.index',compact('cotizaciones'));
    }

    public function create(){
        return view('cotizacion.create');
    }

    public function store(CotizacionRequest $request ){
        $cotizacion = new Cotizacion();
        if(auth::guest()){
            $cotizacion -> id_usuario = 1;
        }else{
            $cotizacion -> id_usuario = Auth::user()->id;
        }
        $cotizacion -> fecha_c = $request->get('fecha_c');
        $cotizacion -> hora_c = $request->get('hora_c');
        $cotizacion -> ext_c = $request->get('ext_c');
        $cotizacion -> telefono_c = $request->get('telefono_c');
        $cotizacion -> nombre_c = $request->get('nombre_c');
        $cotizacion -> empresa_c = $request->get('empresa_c');
        $cotizacion -> mail_c = $request->get('mail_c');
        $cotizacion -> mdp_c = $request->get('mdp_c');
        $cotizacion -> facturacion_c = $request->get('facturacion_c');
        $cotizacion -> comentario_c = $request->get('comentario_c');
        $cotizacion -> direccion_c = $request->get('direccion_c');

        $juegos= DB::select('select distinct j.* 
                            from juegos j , juego_estado je
                            where j.id = je.juego_id AND 
                            je.estado_juego = "disponible" AND
                            j.id not in
                                (select da.juego_id 
                                  from detalle_arriendo da, arriendos a 
                                  where da.arriendo_id = a.id and a.fecha = ?)',
            [$request->get('fecha_c')]);

        $cotizacion -> save();
        $id = $cotizacion->id;

        return view('cotizacion.add')->with('id_cotizacion',$id)->with('juegos',$juegos);
    }

    public function add(){
        $id_j = $_POST['id_juego'];
        $id_c = $_POST['id_cotizacion'];
        $AD = new CotizacionDetalle();
        $AD->juego_id = $id_j;
        $AD -> cotizacion_id = $id_c;
        $AD->save();
    }

    public function remove(){
        $id_j = $_POST['id_juego'];
        $id_c = $_POST['id_cotizacion'];
       $AD = CotizacionDetalle::DeleteDetalle($id_c, $id_j);
    }

    public function show($id){
        $ar = Cotizacion::FindOrFail($id);
        $ad = CotizacionDetalle::detalle($id);
        return view('cotizacion.show')->with('cotizacion',$ar)->with('detalles',$ad);
    }
    
    public function edit(){}
    public function update(){}

    public function cancelar($id){
    $co = Cotizacion::find($id);
        if(is_null($co)){
            return view('welcome')->withErrors('No existe el registro indicado');
        }
        else {
            $co->delete();
            return view('welcome')->withErrors('Se ha cancelado su cotizacion');
        }
    }


    public function destroy($id){
        $co = Cotizacion::find($id);
        if(is_null($co)){
            return redirect()->route('arriendo.index')
                ->withErrors('No existe el registro indicado');

        }
        else {
            $co->delete();
            return view('welcome')->withErrors('Se ha cancelado su cotizacion');
        }

    }
}
