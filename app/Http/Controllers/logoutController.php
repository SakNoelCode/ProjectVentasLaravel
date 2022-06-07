<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
/*Controlador creado a través del comando php artisan make:controller logoutController*/

class logoutController extends Controller
{
    //
    public function logout()
    {
        //Nos permite liberar el flujo de las sesiones
        request()->session()->flush();
        //Session::flush();
        //Destruir la sesión
        Auth::logout();
        //Redireccionar a la página de Login
        return redirect()->route('login-show');
    }
}
