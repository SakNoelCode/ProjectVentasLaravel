<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Clase creada con el comando:   php artisan make:request storeProductoRequest
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
        //Poner como esta en el formulario, los atributos name
        return [
            'cod_producto' => 'required|unique:productos,cod_producto|max:255',
            'name' => 'required|max:40|unique:productos,name',
            'description' => 'required|max:255',
            'amount' => 'required|numeric',
            'fecha' => 'date|nullable',
            'stock' => 'required|integer',
            'category_id' => 'required|integer',
            'unidadmedida_id' => 'required|integer',
            'presentacion_id' => 'required|integer',
        ];
    }

    //Personalizar nombres de atributos
    public function attributes()
    {
        return [
            'cod_producto' => 'código',
            'name' => 'nombre',
            'description' => 'descripción',
            'amount' => 'precio',
            'fecha' => 'fecha Vencimiento',
            'stock' => 'stock',
            'category_id' => 'categoria',
            'unidadmedida_id' => 'unidad de Medida',
            'presentacion_id' => 'presentación',
        ];
    }

    //Personalizar mensajes
    public function messages()
    {
        return[
            'cod_producto.required' => 'Debe ingresar un código'
        ];
    }
}
