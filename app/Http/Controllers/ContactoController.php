<?php

namespace App\Http\Controllers;

use App\Contacto;
use Illuminate\Http\Request;
use App\Http\Requests\ContactoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;



class ContactoController extends Controller
{

    public function index(){
        $contactos = Contacto::orderby('created_at','desc')->paginate(10);
        return view('contacto.index',compact('contactos'));
    }

    public function create(){
        return view('contacto.create');
    }

    public function store(ContactoRequest $request){
        $contacto = new Contacto();
        if(Auth::Guest()){
                    $contacto ->id_usuario = 1;

        }
        else{
                   $contacto ->id_usuario = Auth::user()->id;
 
        }
        $contacto->tipo_contacto = $request->input('tipo_contacto');
        $contacto->mensaje_contacto = $request->input('mensaje_contacto');
        $contacto->nombre_contacto = $request->input('nombre_contacto');
        $contacto->telefono_contacto = $request->input('telefono_contacto');
        $contacto->mail_contacto = $request->input('mail_contacto');
        $contacto->save();
        Session::flash('flash_message','Mensaje enviado con exito');

        return view('welcome');
    }

    public function show($id){
        $contacto=Contacto::findorfail($id);
        return view('contacto.show',compact('contacto',$contacto));
    }

    public function update(ContactoRequest $request, $id){
            $contacto = Contacto::findorfail($id);
            $contacto ->estado_contacto = $request->input('estado_contacto');
            $contacto->mensaje_contacto = $request->input('mensaje_contacto');
            $contacto->nombre_contacto = $request->input('nombre_contacto');
            $contacto->telefono_contacto = $request->input('telefono_contacto');
            $contacto->mail_contacto = $request->input('mail_contacto');
            $contacto-> save();
            return redirect()->route('contacto.index')->with('success','Informacion  Actualizada Satisfactoriamente');
    }


    public function destroy($id){
            $contacto =Contacto::findorfail($id);
            if( $contacto->estado_contacto == 'Revisado'){
                $contacto = Contacto::destroy($id);
                Session::flash('flash_message', 'mensaje eliminado con exito');
                return redirect()->route('contacto.index');
            }
            else{
                Session::flash('flash_message', 'el mensaje aun no es revisado');
                return redirect()->route('contacto.index');
            }
        }
    
}

