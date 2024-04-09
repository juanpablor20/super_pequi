<?php

namespace App\Http\Controllers;

use App\Events\UserUpdated;
use App\Models\Address;
use App\Models\Contacts;
use App\Models\Logins;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $perfil = Users::find($id);

        return view('perfil.edit', compact('perfil'));
    }

   
    public function update(Request $request, Users $perfil)
    {
        // Validación de datos
        $request->validate(Users::$rules);
    
        // Actualiza los datos del perfil
        $perfil->names = $request->names;
        $perfil->last_name = $request->last_name;
        $perfil->type_identification = $request->type_identification;
        //$perfil->number_identification = $request->number_identification;
        $perfil->sex_user = $request->sex_user;
        $perfil->gender_sex = $request->gender_sex;
        $perfil->save();
    
        // Actualiza los datos de contacto
        $perfil->contacts->email_con = $request->email_con;
        $perfil->contacts->telephone_con = $request->telephone_con;
        $perfil->contacts->save();
    
        // Actualiza los datos de la dirección
        $perfil->address->addres_add = $request->addres_add;
        $perfil->address->save();
        
        //dd(event(new UserUpdated($perfil)));
        
    
        // Redirecciona de vuelta a la vista de perfil o a donde lo necesites
        return redirect()->route('perfil.index')->with('Exito', 'Datos actualizados exitosamente');
    }
      //     ->with('Exito', 'Equipo Actualizado exitosamente');
    }



   

