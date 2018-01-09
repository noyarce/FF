<?php

namespace App\Http\Controllers;
use App\Imagenes;
use App\Juego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;


class ThumbnailController extends Controller{
    public function index(){
        $fotos = Imagenes::all();
        $juegos = Juego::all();
        return view('fotos.index', compact('fotos'));
    }

    public function create(){
        return view('fotos.upload');
    }

    public function store(){
        $file = Input::file('imagen');
        $image = \Image::make(\Input::file('imagen'));
        $filename  = time();
        $path = public_path().'/storage/';
        $image->save($path.$file->getClientOriginalName());
        $image->resize(240,200);
        $image->save($path.'thumb_'.$file->getClientOriginalName());
        $thumbnail = new Imagenes();
        $thumbnail->nombre = Input::get('nombre');
        $thumbnail->imagen = $file->getClientOriginalName();
        $thumbnail->save();
        return redirect()->route('fotos.index');
    }

    public function destroy($id){
       $foto=Imagenes::findorfail($id);
       $foto->delete();
        $fotos = Imagenes::all();
        $juegos = Juego::all();       Session::flash('flash_message', 'imagen eliminada con exito');

        return view('fotos.index', compact('fotos'));

    }





}
