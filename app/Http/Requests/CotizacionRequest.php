<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CotizacionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $after_date = Carbon::now()->toDateString();

        return [
            'fecha_c'=>'required|date|after:' . $after_date ,
            'hora_c'=>'required',
            'telefono_c'=> 'required|numeric',
            'nombre_c'=> 'required|regex:/(^[a-zA-Z\ ]+$)+/i',
            'empresa_c'=> 'regex:/(^[a-zA-Z\ ]+$)+/i',
            'mail_c'=>'required|email',
            'mdp_c'=>'required',
            'comentario_c'=>'regex:/(^[a-zA-Z\ ]+$)+/i',
            'facturacion_c'=>'required',
            'direccion_c'=>'required',
        ];
    }

    public function messages (){
        return[
            'fecha_c.required' => 'Debe Seleccionar una fecha',
            'hora_c.required' => ' Debe seleccionar un horario',
            'telefono_c.required' => ' El campo "telefono" no puede ser vacio',
            'nombre_c.required' => ' El campo "Nombre" no puede ser vacio',
            'mail.required' => ' El campo email no puede ser vacio',
            'mdp_c.required' => ' Debe seleccionar un medio de Pago',
            'facturacion_c.required' => ' Debe seleccionar un medio de facturacion',
            'direccion_c.required' => ' Debe indicar una Direccion',
        ];
    }

}


