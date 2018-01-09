<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\ArriendoDetalle;
use App\Arriendo;
use App\ArriendoEstado;
use App\Http\Requests\ArriendoRequest;
use App\Http\Requests\MantencionRequest;
use App\Juego;
use App\JuegoEstado;
use App\Mantencion;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Requests;


class MantencionController extends Controller
{
    public function index(){
        $juegos = JuegoEstado::estado();
        return view('mantencion.index',compact('juegos', $juegos));
    }
       public function index_basico(){
        $juegos = JuegoEstado::estado();
        return view('mantencion.index_basico',compact('juegos', $juegos));
    }
    

    public function solicitud_mantencion(){
        $solicitudes = Mantencion::listar();
        return view ('mantencion.detalle')->with('solicitudes',$solicitudes);
    }

    public function solicitud($id){
        $sol = Mantencion::find($id);
        $user = User::find($sol->id_usuario);
        $juego = Juego::find($sol->juego_id);
        Return view ('mantencion.ver')->with('sol',$sol)->with('user',$user)->with('juego',$juego);
    }

    public function create($id){
        $juego = Juego::findorfail($id);
        return view('mantencion.create')->with('juego',$juego);
    }

    public function update(MantencionRequest $request , $id){
    JuegoEstado::updatemantencion($id, $request->get('estado_juego'));
    Session::flash('flash_message','Estado actualizado con exito');
    return redirect()->to ('mantencion');
    }



    public function store( MantencionRequest $request){
        $mantencion = new Mantencion();
        $mantencion ->id_usuario= Auth::user()->id;
        $mantencion ->juego_id = $request->get('juego_id');
        $mantencion ->comentario_mantencion = $request->get('comentario_mantencion');
        $mantencion->save();
        Session::flash('flash_message','Solicitud enviada con exito');
        return redirect()->to('/');

    }

    public function show($id){
        $juegos = Mantencion::show_detalle($id);
        if (empty($juegos) )  {
               $j = Juego::findorfail($id);
            $je = JuegoEstado::encontrar($id);
             Return view ('mantencion.show')->with('juegos',$juegos)
             ->withFlashMessage(' Juego '.$j->nombre.' no registra arriendos desde ultima mantencion' );    
        }
        else{
               Return view ('mantencion.show')->with('juegos',$juegos);
            }
    }

    public function destroy($id){
        $mantencion = Mantencion::findorfail($id);
        $mantencion->delete();
        return redirect()->to('solicitudes_mantencion')->withFlashMessage('solicitud Eliminada');
    }
    
}
