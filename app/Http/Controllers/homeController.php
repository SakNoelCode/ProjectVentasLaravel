<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    //
    public function index()
    {
        //Enviar el valor de la variable de sesión
        if (Auth::check()) {
            //$username = Auth()->user()->name;
            return view('Panel.panel');
        }
        //Si no hay sesión activa
        return view('auth.login');
    }
}
