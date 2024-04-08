<?php

namespace App\Http\Controllers;

use App\Models\Logins;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    
    // public function index()
    // {
    //     $equipment = Users::paginate(10);
    //     return view('equipment.index', compact('equipment'))
    //         ->with('i', (request()->input('page', 1) - 1) * $equipment->perPage());
    // }


    public function index()
{
    if (Auth::check()) {
        // Si el usuario está autenticado, obtenemos su número de documento
        $numeroDocumento = auth()->user()->users;
        // Buscamos al usuario en la tabla Users usando el número de documento
        $user = Users::with('contacts', 'Address')->where('number_identification', $numeroDocumento)->first();
        
        return view('perfil.index', compact('user'));
       
    } else {
        // Manejar el caso en que el usuario no esté autenticado
        return "Error: El usuario no está autenticado";
    }
}
    public function edit($id)
    {
        $user = Users::find($id);

        return view('perfil.edit', compact('user'));
    }

   
    public function update(Request $request, Users $user)
    {
        request()->validate(Users::$rules);

        $user->update($request->all());

        return redirect()->route('perfil.index')
            ->with('Exito', 'Equipo Actualizado exitosamente');
    }
}


   

