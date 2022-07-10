<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ventasRequest extends FormRequest
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
             //Tabla Venta
             'numero' => 'required|max:50',
             'total_venta' =>'required',
             'cliente_id'=>'required|integer',

             //Tabla Detalle Venta
            //'cantidad' => 'required|integer',
            //'precio' => 'required|numeric',
            //'subtotal' => 'required|numeric',
            //'producto_id' => 'required|integer',
            //'venta_id' => 'required|integer',

            //'estado' => 'required|max:10',
        ];
    }
}
