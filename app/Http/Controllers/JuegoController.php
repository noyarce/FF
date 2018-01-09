<?php

namespace App\Http\Controllers;

use App\Imagenes;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\JuegoEstado;
use Illuminate\Http\Request;
use App\Juego;
use App\Http\Requests\JuegoRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class JuegoController extends Controller{
    public function index(){
        $juegos = Juego::all();
        $fotos = Imagenes::all();

        return view('juegos.index',compact('juegos','fotos'));
    }
    
     public function all(){
        $juegos = Juego::all();
        $fotos = Imagenes::all();

        return view('juegos.index',compact('juegos','fotos'));
    }

    public function create(){
        return view('juegos.create');
    }
    public function store(JuegoRequest $request){
        $juego = new Juego ();
        $juego->nombre = $request->input('nombre');
        $juego->j_largo = $request->input('j_largo');
        $juego->j_ancho = $request->input('j_ancho');
        $juego->j_alto = $request->input('j_alto');
        $juego->precio = $request->input('precio');
        $juego->precio_hora_extra = $request->input('precio_hora_extra');
        $juego->save();
        $id = $juego->id;

        $as = JuegoEstado::create([ 
            "juego_id" => $id, "ultima_mantencion" => Carbon::today()]);
        
        
        
        Session::flash('flash_message','Juego Guardado con exito');
        return redirect()->to('juegos');

    }
    
    
    public function view($id_juego){
        $juego=Juego::find($id_juego);
        return view('juegos.show',compact('juegos',$juego));
    }
    public function show(Request $request){
        if($request->ajax()){
            $id = $request->id_juego;
            $juego=Juego::find($id);
            return response()->json($juego);
        }
    }

    public function juegosdisponibles(){
        return view('juegos.date');
    }

    public function disponibles(Request $request){
        if($request->ajax()){
            $fecha= $request->get('fecha');
            $juegos= DB::select('select distinct j.* 
                            from juegos j , juego_estado je
                            where j.id = je.juego_id AND 
                            je.estado_juego = "disponible" AND
                            j.id not in
                                (select j.id 
                                  from detalle_arriendo da , arriendos a , juegos j
                                  where j.id =da.juego_id and da.arriendo_id = a.id and a.fecha = ?)',
                [$fecha]);

            return response()->json($juegos);
        }
    }

    public function estado(){
        $juegos=Juego::estado();
        return view('juegos.estado',compact('juegos',$juegos));
    }

    public function edit($id){
        $juego=Juego::find($id);
        return view('juegos.edit',compact('juego',$juego));
    }

    public function update(JuegoRequest $request, $id){
        $juego=Juego::find($id);
        $juego->nombre = $request->input('nombre');
        $juego->j_largo = $request->input('j_largo');
        $juego->j_ancho = $request->input('j_ancho');
        $juego->j_alto = $request->input('j_alto');
        $juego->precio = $request->input('precio');
        $juego->precio_hora_extra = $request->input('precio_hora_extra');
        $juego->save();
        Session::flash('flash_message','Juego Guardado con exito');
        return redirect()->to('juegos');
    }
    
    public function destroy($id){
        $juego = Juego::find($id);
        if(is_null($juego)){
            return redirect()->to('juegos_administrar')
                ->withErrors('No existe el juego');
        }
        else {
            $juego = Juego::destroy($id);
            return redirect()->back()->withFlashMessage('Juego Eliminado');
            }
        }
    


}
