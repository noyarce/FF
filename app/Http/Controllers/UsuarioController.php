<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;

use App\User;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Hash;


class UsuarioController extends Controller{
    public function index(){
          if ((Auth::user()->tipo_usuario ==5 )){
            return redirect()->to('/home');
        }
        
        if( Auth::guest() ){
            return redirect()->to('/home');
        }
        else{
        
        $users = User::orderby('tipo_usuario','asc')->paginate(5);
        return view('usuario.index',compact('users'));
        }
    }
    public function create(){
          if ((Auth::user()->tipo_usuario ==5  )){
            return redirect()->to('/home');
        }
        
        if( Auth::guest() ){
            return redirect()->to('/home');
        }
        else{
        return view('usuario.create');
        }
        
    }

    public function show($id){
          if ((Auth::user()->tipo_usuario ==5 && Auth::user()->id != $id )){
            return redirect()->to('/home');
        }
        
        if( Auth::guest() ){
            return redirect()->to('/home');
        }
        else{
        
        $user = User::find($id);
        return view ('usuario.edit',compact('user'));
        }
        
    }
    
     public function user_show(Request $request){
        if($request->ajax()){
            $id = $request->id;
            $user=User::find($id);
            return response()->json($user);
        }
    }
    
    public function store(UserRequest $request){
        $user = User::create([
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "password" => Hash::make($request->input('password')),
            "tipo_usuario" => $request->input('tipo_usuario')
            ]);
        
        Session::flash('flash_message','Usuario registrado con exito');
        return redirect()->to('usuarios');
    }

    
    public function edit($id){
      
        $user = User::find($id);
        return view ('usuario.edit',compact('user'));
        
    }
    
    public function rol($id){
        $user = User::find($id);
        return view ('usuario.rol',compact('user'));
    }
    
    
    public function change($id){
        if ((Auth::user()->tipo_usuario ==5 && Auth::user()->id != $id )){
            return redirect()->to('/home');
        }
        
        if( Auth::guest() ){
            return redirect()->to('/home');
        }
        else{
        $user = User::find($id);
        return view ('usuario.pass',compact('user'));
        }
        
    }
    
    
    public function NewPass(UserRequest $request, $id){
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|confirmed',
            ]);

        if ($validator->fails()){
             Session::flash('alert-warning','ContraseÃ±as no coinciden, intente nuevamente');
            return back();
        }
    
        else{
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email =$request->input('email');
            $user->password =  bcrypt($request->input('password'));
            $user->tipo_usuario = $request->input('tipo_usuario');
            $user->save();
            Session::flash('flash_message','Usuario actualizado con exito');
            return redirect()->to('/home');
            }
            
        }


    public function update(UserRequest $request, $id){
        $user = User::find($id);
        
        $validator = Validator::make($request->all(), [
            'email'  =>  'required|unique:users,email,'.$id, 
            ]);

        if ($validator->fails()){
             Session::flash('alert-warning','el email indicado ya est«¡ en uso');
            return back();
        }
    
        else{
            $user->name = $request->input('name');
            $user->email =$request->input('email');
            $user->password = $request->input('password');
            $user->tipo_usuario = $request->input('tipo_usuario');
            $user->save();
            Session::flash('flash_message','Usuario actualizado con exito');
            return redirect()->to('usuarios');
        }
        
    }


    public function destroy($id){
        if($id == '1'){
            return redirect()->to('usuarios')->withErrors('No se permite eliminar a este usuario');
        }
        else{
            $user = User::destroy($id);
             //$user->delete();
             return redirect()->to('usuarios')->withFlashMessage('Usuario Eliminado');
        }

    }
}
