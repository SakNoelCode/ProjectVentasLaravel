<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use App\Models\User;
use Illuminate\Http\Request;

/*Controlador creado a través del comando php artisan make:controller registerController*/

class registerController extends Controller
{
    //ruta de la vista
    public function show(){
        return view('auth.register');
    }

    public function register(registerRequest $request){
        $user = User::create($request->validated());  
    }
}
