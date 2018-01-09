<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\ArriendoDetalle;
use App\Arriendo;
use App\ArriendoEstado;
use App\Http\Requests\ArriendoRequest;
use App\Http\Requests\ArriendoEstadoRequest;
use App\Juego;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Http\Requests;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ArriendoController extends Controller
{

    public function index(){
        $arriendos = Arriendo::paginate(20);
        return view('arriendo.index',compact('arriendos'));
    }

    public function hoy(){
        $arriendos = Arriendo::hoy();
        $juegos = Arriendo::juegosHoy();
        return view('arriendo.hoy',compact('arriendos', 'juegos'));
    }

    public function mis(){
        $arriendos = Arriendo::mis();
        return view('arriendo.mis',compact('arriendos'));

    }

    public function pendientes(){
        $arriendos = Arriendo::pend();
        return view('arriendo.pendientes',compact('arriendos'));
    }

    public function fecha (){
        return view ('arriendo.date');
    }

    public function date(Request $request){
        if($request->ajax()){
            $fecha= $request->get('fecha');
            $arriendos= Arriendo::fechas($fecha);
        return response()->json($arriendos);
        }
    }


   public function detalles(Request $request){
        if($request->ajax()){
            $id_arriendo = $request -> get ('id_arriendo');
            $detalles =ArriendoDetalle::detalle($id_arriendo);
            return response()->json($detalles);
        }
    }
    public function create(){
        if(Auth::guest()){
            return view('auth.login');
        }
            else{
                return view('arriendo.create');

            }

    }
    public function store(ArriendoRequest $request ){
        $ar = new Arriendo();
        $ar -> id_usuario= Auth::user()->id;
        $ar -> fecha = $request->get('fecha');
        $ar->hora= $request->get('hora');
        $ar->ext= $request->get('ext');
        $ar->cliente = $request->get('cliente');
        $ar->fono = $request->get('fono');
        $ar->mdp = $request->get('mdp');
        $ar->facturacion = $request->get('facturacion');
        $ar->lat= $request->get('lat');
        $ar->lng = $request->get('lng');
        $ar->direccion = $request->get('direccion');
        $ar->comentario = $request->get('comentario');
        
        $juegos= DB::select('select distinct j.* 
                            from juegos j , juego_estado je
                            where j.id = je.juego_id AND 
                            je.estado_juego = "disponible" AND
                            j.id not in
                                (select da.juego_id
                                  from detalle_arriendo da, arriendos a 
                                  where da.arriendo_id = a.id and a.fecha = ?)',
            [$request->get('fecha')]);

        $ar -> save();
        
        $id = $ar->id;
        $as = ArriendoEstado::create([ "arriendo_id" => $id ]);
        
        return view('arriendo.add')->with('id',$id)->with('juegos',$juegos);
    }


    public function edit($id){
        $arriendo=Arriendo::find($id);
        return view('arriendo.edit',compact('arriendo',$arriendo));
    }


    public function update(ArriendoRequest $request, $id){
        $ar = Arriendo::find($id);
        $ar -> id_usuario= $request->get('id_usuario');
        $ar -> fecha = $request->get('fecha');
        $ar->hora= $request->get('hora');
        $ar->ext= $request->get('ext');
        $ar->cliente = $request->get('cliente');
        $ar->fono = $request->get('fono');
        $ar->mdp = $request->get('mdp');
        $ar->facturacion = $request->get('facturacion');
        $ar->lat= $request->get('lat');
        $ar->lng = $request->get('lng');
        $ar->direccion = $request->get('direccion');
        $ar->comentario = $request->get('comentario');
        $ar -> save();
        return back()->withFlashMessage('Arriendo actualizado');
    }

    public function add(){
        $id_j = $_POST['id_juego'];
        $id_a = $_POST['id_arriendo'];

        $AD = new ArriendoDetalle();
        $AD->juego_id = $id_j;
        $AD ->arriendo_id = $id_a;
        $AD->save();
        }

    public function remove(){
        $id_j = $_POST['id_juego'];
        $id_a = $_POST['id_arriendo'];
        $AD = ArriendoDetalle::DeleteDetalle($id_a, $id_j);
    }

    public function status($id){
            $ar = Arriendo::FindOrFail($id);
            $ae = ArriendoEstado::estado($id);
            return view('arriendo.status')->with('arriendo', $ar)->with('estado', $ae);
    }

    public function store_status(ArriendoEstadoRequest $request , $arriendo_id){
          DB::table('arriendo_estado')->where('arriendo_id', $arriendo_id)->update(['estado_arriendo' => $request->get('estado_arriendo')]);
      
        return redirect()->route('pendientes')->withFlashMessage('Arriendo Actualizado');
    }



    public function show($id){
        if(Auth::guest()){
            return view('auth.login');
        }
        $ar = Arriendo::FindOrFail($id);
        if ((Auth::user()->tipo_usuario ==5 && Auth::user()->id != $ar -> id_usuario )){
            return view('welcome');
        }
        else{
            $ar = Arriendo::FindOrFail($id);
            $ad = ArriendoDetalle::detalle($id);
            $ae = ArriendoEstado::estado($id);
            return view('arriendo.show')->with('arriendo', $ar)->with('detalles', $ad)->with('estado', $ae);
        }
    }

    public function destroy($id){
        $arriendo = Arriendo::findorfail($id);
         $arriendo->delete();
             return redirect()->to('home')->withFlashMessage('Arriendo Eliminado');
            }
    



}
