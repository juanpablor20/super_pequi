<?php

namespace App\Http\Controllers;

use App\Models\Logins;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Address;
use App\Models\Contacts;
use Spatie\Permission\Models\Role;

class BibliotecarioController extends Controller
{

    public function index()
    {
        $bibliotecarioRole = Role::where('name', 'bibliotecario')->where('guard_name', 'web')->first();

        if ($bibliotecarioRole) {
            $bibliotecarios = Users::role($bibliotecarioRole)->paginate(10); // Paginar los resultados
            $i = ($bibliotecarios->currentPage() - 1) * $bibliotecarios->perPage(); // Calcular el valor de $i

            return view('bibliotecarios.index', compact('bibliotecarios', 'i'));
        } else {
            // Manejar el caso en que el rol no existe
            return "El rol de 'bibliotecario' no existe.";
        }
    }

    public function create()
    {
        $user = new Users();
        return view('bibliotecarios.create', compact('user'));
    }
    public function store(Request $request)
    {
        $user = Users::create($request->all());

        $request->validate(Users::$rules);

        $contacts = Contacts::create([
            'email_con' => $request->input('email_con'),
            'telephone_con' => $request->input('telephone_con'),
            'id_user_con' => $user->id,
        ]);

        $address = Address::create([
            'addres_add' => $request->input('addres_add'),
            'id_user_add' => $user->id,
        ]);

        $login = Logins::create([
            'users' => $request['number_identification'],
            'password' => Hash::make($request['password']),
        ]);


        $user->assignRole('bibliotecario');

        $login->save();
        $contacts->save();
        $address->save();

        return redirect()->route('bibliotecarios.index')->with('Exito', 'Bibliotecario creado con éxito.');
    }


    public function show($id)
    {
        $user = Users::with('contacts', 'Address')->find($id);
        return view('bibliotecarios.show', compact('user'));
    }

    public function edit($id)
    {
        $user = Users::find($id);
        $contact = $user->contacts;
        $address = $user->Address;
        return view('bibliotecarios.edit', compact('user', 'contact', 'address'));
    }

    public function update(Request $request, Users $b1)
    {
         $request->validate(Users::$rules);
         //dd($request->all());
         $b1->update($request->all());
        return redirect()->route('bibliotecarios.index')->with('Exelente', 'Biliotecario Actualizado Exitosamente');
    }
   
    public function destroy($id)
    {
        $user = Users::find($id)->delete();
        return redirect()->route('bibliotecarios.index')->with('Exito', 'Bibliotecario inactivado Exitosamente');
    }
}
