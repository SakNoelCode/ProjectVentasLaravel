<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Auth\Factory as ValidationFactory; //Clase que se va a usar para validar el email

/*Request creado a través del comando php artisan make:request loginRequest*/
/**Se usa esta clase para verificar las solicitudes de tipo Request */

class loginRequest extends FormRequest
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
        return [
            'name'=>'required',
            'password'=>'required',	
        ];
    }

    /**Obtener Credenciales del Usuario */
    public function getCredentials(){
        return [
            'name' => $this->get('name'),
            'password' => $this->get('password'),	
        ]; 
    }

    /**Verificar si el campo es un correo (INACTIVO)*/ 
    public function isEmail($value){
        $factory = $this->container->make(ValidationFactory::class);
        //$factory = $this->container->make(['name'=>$value],['name'=>'email'])->fails();
        //return $factory->make(['name'=>$value],['name'=>'email'])->fails();
        return $factory->make(['name'=>$value],['name'=>'email'])->fails();
    }               
}
