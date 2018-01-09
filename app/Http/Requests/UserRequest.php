<?php

namespace App\Http\Requests;
use App\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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

    public function rules(){

        return [
            'name' => 'required|max:70|string',
//          'email'  =>  'required|unique:users,id,'.$id,
            
//          'email' => 'required|email|max:255'.Rule::unique('users')->ignore($user->id),
            'password' => 'required|min:6|confirmed',
            'tipo_usuario' => 'required'
        ];

    }

    public function messages (){
        return[
            


        ];
    }
}
