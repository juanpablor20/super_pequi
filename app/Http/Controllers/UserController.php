<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Contacts;
use App\Models\IndexCard;
use App\Models\Relationship;
use App\Models\Service;
use App\Models\Users;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use App\Tables\UserTable;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::whereIn('name', ['aprendices', 'instructor'])
            ->where('guard_name', 'web')
            ->get();


        $table = new UserTable();

        if ($request->expectsJson())
            return $table->getData($request);
        return view('user.index', compact('table'));
    }

    public function create()
    {
        // $ficha = IndexCard::query()->pluck('number', 'id')->all();
        $ficha = IndexCard::where('states', 'active')->get();
        $user = new Users();
        return view('user.create', compact('user', 'ficha'));
    }

    public function store(Request $request)
    {
        $request->validate(Users::getRules());
        $numeroDocumento = $request->input('number_identification');
        $existe = Users::where('number_identification', $numeroDocumento)->exists();
        if ($existe) {

            return redirect()->back()->with('error', 'El número de documento ya está registrado.');
        }

        $user = Users::create($request->all());

        $contacts = Contacts::create([
            'email_con' => $request->input('email_con'),
            'telephone_con' => $request->input('telephone_con'),
            'id_user_con' => $user->id,
        ]);

        $address = Address::create([
            'addres_add' => $request->input('addres_add'),
            'id_user_add' => $user->id,
        ]);

        $role = $request->input('role');
        if ($role == 'aprendices') {

            $validacionFicha = $request->input('index_card_id'); // Corregí el nombre de la variable

            if (!$validacionFicha) {
                return redirect()->back()->with('error', 'No ha seleccionado la ficha.');
            }
            $ficha = Relationship::create([
                'index_card_id' => $request->input('index_card'),
                'user_rel_id' => $user->id,
            ]);
        }

        $role = $request->input('role');
        if ($role == 'aprendices') {
            $user->assignRole('aprendices');
            // Asignar el rol de "aprendiz"
        } elseif ($role == 'instructor') {
            $user->assignRole('instructor'); // Asignar el rol de "instructor"
        }

        $contacts->save();
        $address->save();

        return redirect()->route('users.index')->with('success', 'Usuario Creado Exitosamente.');
    }

    public function show($id)
    {
        $user = Users::with('contacts', 'Address', 'Relacion')->find($id);
        $prestamos = Service::where('user_borrower_id', $user->id)->get();

        // Obtengo todos los préstamos asociados con el usuario
        return view('user.show', compact('user', 'prestamos'));
    }
    public function edit($id)
    {

        $ficha = IndexCard::where('state', 'active');
        $user = Users::find($id);
        $contact = $user->contact;
        $address = $user->address;
        return view('user.edit', compact('user', 'contact', 'address', 'ficha'));
    }

    public function update(Request $request, Users $user)
    {
        $request->validate(Users::getUpdateRules());
        if ($user->states == 'Whith_equipment') {
            // Si el estado es "prestamo", redireccionar con un mensaje de error
            return redirect()->back()->with('error', 'No se puede actualizar un usuario en estado de préstamo.');
        }
        $userId = $user->id;
        $request->validate([
            'number_identification' => [
                'required',
                Rule::unique('users')->ignore($userId),
            ],
        ]);
        // Actualiza los datos del usuario
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente');
    }
    public function destroy($id)
    {
        $user = Users::find($id);
        if ($user) {


            $user->update(['states' => 'inactive']);

            return redirect()->route('users.index')->with('success', 'Usuario inactivo exitosamente');
        } else {
            return redirect()->route('users.index')->with('error', 'ocurrio un error al actualizar');
        }
    }
}
