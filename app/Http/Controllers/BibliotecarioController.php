<?php

namespace App\Http\Controllers;

use App\Models\Logins;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Address;
use App\Models\Contacts;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class BibliotecarioController extends Controller
{

    public function index()
    {
        //busca al rol bibliotecario  y lo asigna ala variable  $bibliotecarioRole
        $bibliotecarioRole = Role::where('name', 'bibliotecario')->where('guard_name', 'web')->first();
        $bibliotecarios = Users::role($bibliotecarioRole)->paginate(10); // Paginar los resultados

        // Si no hay registros, redirige a la vista de creación
        if ($bibliotecarios->isEmpty()) {
            return redirect()->route('bibliotecarios.create');
        }

        // Si hay registros, muestra la vista con los registros existentes
        return view('bibliotecarios.index', compact('bibliotecarios'))
            ->with('i', ($bibliotecarios->currentPage() - 1) * $bibliotecarios->perPage());
    }




    public function create()
    {
        $user = new Users();
        //se llama al modelo para que eloquent cree el usuario en este caso bibliotecario 
        return view('bibliotecarios.create', compact('user'));
    }


    public function store(Request $request)
    {
        $rules = array_merge(Users::getRules(), Users::getPasswordRules());

        // Valida todas las reglas en una sola llamada
        $validatedData = $request->validate($rules);

        // Crea el usuario utilizando los datos validados
        $user = Users::create($request->all()); //se crean usuarios utilizando eloquent

        //informacion adicional
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

        //metodos para guardar 
        $login->save();
        $contacts->save();
        $address->save();

        return redirect()->route('bibliotecarios.index')->with('success', 'Bibliotecario creado con éxito.');
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

    public function update(Request $request, Users $bibliotecario)
    {
        $request->validate(Users::getUpdateRules());


        //se valida para que al actualizar no actualizen a un numero de documento existente
        $userId = $bibliotecario->id;
        $request->validate([
            'number_identification' => [
                Rule::unique('users')->ignore($userId),
            ],
        ]);
        $bibliotecario->update($request->all());
        $bibliotecario->contacts->email_con = $request->email_con;
        $bibliotecario->contacts->telephone_con = $request->telephone_con;
        $bibliotecario->contacts->save();

        // Actualiza los datos de la dirección
        $bibliotecario->address->addres_add = $request->addres_add;
        $bibliotecario->address->save();

        // Encuentra el registro de login correspondiente y actualiza la contraseña
        $login = Logins::where('users', $bibliotecario->number_identification)->firstOrFail();
        $login->password = Hash::make($request->password);
        $login->save();



        return redirect()->route('bibliotecarios.index')->with('success', 'Biliotecario Actualizado Exitosamente');
    }

    public function destroy($id)
    {
        // Encuentra al usuario por su ID
            $user = Users::find($id);
            $user->states = 'inactive';
            $user->save();

            
            return redirect()->back()->with('success', 'Usuario dado de baja.');
    }
    
    public function activate($id)
    {
        $user = Users::find($id);
        $user->states = 'active';
        $user->save();
        return redirect()->route('bibliotecarios.index')->with('success', 'bibliotecario activado.');
    }
}
