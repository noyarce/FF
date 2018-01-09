<?php

namespace App\Http\Controllers;
use App\Imagenes;
use Illuminate\Http\Request;

class StorageController extends Controller{
    public function index(){
      return \View::make('fotos.new');
    }

    public function save(Request $request){
       $file = $request->file('file');
       $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put($nombre, \File::get($file));
        return "archivo guardado";
    }
}
