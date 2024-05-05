<?php

namespace App\Http\Controllers;

use App\Models\Logins;
use Illuminate\Support\Facades\Hash;
use App\Models\Address;
use App\Models\Contacts;
use App\Models\IndexCard;
use App\Models\Relationship;
use App\Models\Service;
use App\Models\Users;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use Takielias\TablarKit\Facades\TablarKit;

class UserController extends Controller
{
    public function index()
    {
        $aprendicesRole = Role::where('name', 'aprendices')->where('guard_name', 'web')->first();
        $instructorRole = Role::where('name', 'instructor')->where('guard_name', 'web')->first();

        if ($aprendicesRole && $instructorRole) {
            $aprendices = Users::role($aprendicesRole)->paginate(10);
            $instructores = Users::role($instructorRole)->paginate(10);
            $users = $instructores->merge($aprendices);
            $i = ($instructores->currentPage() - 1) * $instructores->perPage();
            $perPage = 10;
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $currentPageItems = $users->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $users = new LengthAwarePaginator($currentPageItems, $users->count(), $perPage);
            $users->setPath(URL::current());

            return view('user.index', compact('users', 'i'));
        } else {
            return "Uno de los roles ('aprendices' o 'instructor') no existe.";
        }
    }


    public function create()
    {
        $ficha = IndexCard::query()->pluck('number', 'id')->all();
        $user = new Users();
        return view('user.create', compact('user', 'ficha'));
    }

    public function store(Request $request)
    {
        $request->validate(Users::$rules);
        $numeroDocumento = $request->input('number_identification');
        $existe = Users::where('number_identification', $numeroDocumento)->exists();
        if ($existe) {
            // El número de documento ya existe en la base de datos
            //return true;
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
        $ficha = Relationship::create([
            'index_card_id' => $request->input('index_card'), 
            'user_rel_id' => $user->id,
        ]);
        $role = $request->input('role');
        if ($role == 'aprendices') {
            $user->assignRole('aprendices');
            // Asignar el rol de "aprendiz"
        } elseif ($role == 'instructor') {
            $user->assignRole('instructor'); // Asignar el rol de "instructor"
        }
        $ficha->save();
        $contacts->save();
        $address->save();

        return redirect()->route('users.index')->with('success', 'Usuario Creado Exitosamente.');
    }
  
    public function show($id)
    {
        $user = Users::with('contacts', 'Address')->find($id);
        //$user = Users::findOrFail($id);
        $prestamos = Service::where('user_borrower_id', $user->id)->get();
        // Obtengo todos los préstamos asociados con el usuario
        return view('user.show', compact('user', 'prestamos'));
    }
    public function edit($id)
    {
        $user = Users::find($id);
        $contact = $user->contact;
        $address = $user->address;
        return view('user.edit', compact('user', 'contact', 'address'));
    }

    public function update(Request $request, Users $user)
    {
        $request->validate(Users::$updateRules);
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
