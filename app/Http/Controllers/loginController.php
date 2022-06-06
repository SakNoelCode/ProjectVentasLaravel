<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    //ruta de la vista
    public function show(){
        /*Verificar si ya estamos logueados */
        if(Auth::check()){
            return redirect()->route('panel');
        }
        return view('auth.login');
    }

    //ruta para el login
    public function login(loginRequest $request){

        $credentials = $request->getCredentials();

        /**Validar credenciales a través del método Auth*/
        if(!Auth::validate($credentials)){//Si el usuario no es valido
            return redirect()->to('/login')->withErrors('auth.failed');
        }

        /**Si el usuario es valido, entonces se logea*/
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    //ruta para el logout
    public function authenticated(Request $request, $user){
        return redirect()->route('panel');
    }


}
