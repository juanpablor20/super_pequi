<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Logins;
use App\Models\Users;
use DragonCode\Contracts\Cashier\Auth\Auth;
use DragonCode\Contracts\Cashier\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

  use AuthenticatesUsers;

  //...

  public function login(Request $request) 
  {
    // Buscar registro de login
    
     
    $numeroDocumento = auth()->user()->users;
        
    // Buscamos al usuario en la tabla Users usando el número de documento
    $user = Users::where('number_identification', $numeroDocumento)->first();
    // Obtener usuario vinculado

   

    // Iniciar sesión del usuario
   
  }

  //...

}
