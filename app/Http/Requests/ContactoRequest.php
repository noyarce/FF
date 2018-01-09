<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoRequest extends FormRequest
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
        return [
            'tipo_contacto'=>'required',
            'mensaje_contacto'=>'required|regex:/(^[a-zA-Z 0-9 \ ]+$)+/i',
            'nombre_contacto'=> 'required|regex:/(^[a-zA-Z\ ]+$)+/i',
            'telefono_contacto'=>'required|numeric',
            'mail_contacto'=>'required|email',
        ];
    }

    public function messages (){
        return[
            'tipo_contacto.required' => ' El campo "tipo contacto" debe ser Seleccionado ',
            'mensaje_contacto.required' => ' El campo "mensaje" no puede ser vacio',
            'nombre_contacto.required' => ' El campo "nombre" no puede ser vacio',
            'telefono_contacto.required' => ' El campo "telefono" no puede ser vacio',
            'mail_contacto.required' => ' El campo "email" no puede ser vacio',
        ];
    }


}
