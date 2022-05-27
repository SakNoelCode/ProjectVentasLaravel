<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/*Request creado a través del comando php artisan make:request registerController*/

class registerRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        //Reglas de validación
        return [
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6',
            'password_confirmation'=>'required|same:password', 
            'name'=>'required|min:3|unique:users,name',
        ];
    }
}
