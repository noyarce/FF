<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ArriendoRequest extends FormRequest{

    public function authorize(){
        return true;
    }


    public function rules(){
        $after_date = Carbon::now()->toDateString();
        return [
            'fecha'=>'required|date|after:' .$after_date ,
            'hora'=>'required',
            'direccion'=>'required',
            'cliente'=> 'required|regex:/(^[a-zA-Z\ ]+$)+/i',
            'fono' => 'required|numeric',
            'mdp'=>'required',
        ];
    }
    public function messages (){
        return[
            'fecha.required' => 'Debe Seleccionar una fecha',
            'hora.required' => ' Debe seleccionar un horario',
            'direccion.required' => ' Debe indicar una Direccion',
            'fono.required' => ' El campo "telefono" no puede ser vacio',
            'mdp.required' => ' Debe seleccionar un medio de Pago',
            'cliente.required' => ' El campo "Nombre" no puede ser vacio',
        ];
    }

}

