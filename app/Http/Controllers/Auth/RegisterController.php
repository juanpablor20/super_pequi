<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Contacts;
use App\Models\Logins;
use App\Models\Users;
use App\Rules\ValidEmail;
use App\Rules\ValidAddress;


use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'names' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'names' => ['required', 'string', 'max:255'],
            'type_identification' => ['required'],
            'number_identification' => ['required', 'numeric', 'unique:users,number_identification'],
            'sex_user' => ['required'],
            'gender_sex' => ['required'],
            'email_con' => ['string', 'email', 'max:255', new ValidEmail],
            'telephone_con' => ['required'],
            'addres_add' => [new ValidAddress],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'names' => ['required', 'string', 'max:255'],
        ]);


    }

    protected function create(array $data)
    {
        // Crear el rol del usuario si está definido
        if ($roleName = $data['role']) {
            $role = Role::where('name', $roleName)->first();
        }

        // Crear el usuario
        $user = Users::create([
            'names' => $data['names'],
            'last_name' => $data['last_name'],
            'type_identification' => $data['type_identification'],
            'number_identification' => $data['number_identification'],
            'sex_user' => $data['sex_user'],
            'gender_sex' => $data['gender_sex'],
        ]);

        // Asignar rol al usuario si está definido
        if (isset($role)) {
            $user->assignRole($role);
        }

        // Crear los registros relacionados con el usuario
        $contacts = Contacts::create([
            'email_con' => $data['email_con'],
            'telephone_con' => $data['telephone_con'],
            'id_user_con' => $user->id,
        ]);

        $address = Address::create([
            'addres_add' => $data['addres_add'],
            'id_user_add' => $user->id,
        ]);

        // Crear el registro de inicio de sesión
        return Logins::create([
            'users' => $data['number_identification'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
