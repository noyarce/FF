<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JuegoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;    }

    public function rules()
    {
        return [
            'nombre'=> 'required|regex:/(^[a-zA-Z\ ]+$)+/i',
            'j_largo'=> 'required|numeric',
            'j_ancho'=> 'required|numeric',
            'j_alto'=> 'required|numeric',
            'precio'=> 'required|numeric',
            'precio_hora_extra'=> 'required|numeric',
        ];
    }

    public function messages (){
        return[
            'nombre.required' => 'Debe indicar un nombre',
            'j_largo.required' => 'Debe indicar un largo',
            'j_ancho.required' => 'Debe indicar un ancho',
            'j_alto.required' => 'Debe indicar un alto',
            'precio.required' => 'Debe indicar un Costo',
            'precio_hora_extra.required' => 'Debe indicar Costo por hora extra',



        ];
    }
}
