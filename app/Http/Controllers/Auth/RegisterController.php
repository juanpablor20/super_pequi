<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Logins;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

use App\Models\Address;
use App\Models\contacts;
use App\Models\Users;

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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        // Obtener el rol enviado desde el formulario
        // // $roleName = $data['role'];
        // // return $roleName;
        // // // Validar que el rol exista en la base de datos
        // // $role = Role::where('name', $roleName)->first();

        // // if (!$role) {
        // //     // return redirect()->back()->withErrors(['role' => 'El rol proporcionado no es válido']);
        // // }

        // Crear el usuario con los datos proporcionados
        $user = Users::create([
            'names' => $data['names'],
            'last_name' => $data['last_name'],
            'type_identification' => $data['type_identification'],
            'number_identification' => $data['number_identification'],
            'sex_user' => $data['sex_user'],
            'gender_sex' => $data['gender_sex'],
        ]);



        $login = Logins::create([
            'users' => $data['number_identification'],
            'password' => Hash::make($data['password']),

        ]);

        $login->save();

        // $contacts = contacts::create([
        //     'email_con' => $data['email_con'],
        //     'telephone_con' => $data['telephone_con'],
        //     'id_user_con' => $user->id,
        // ]);

        // // Crea la direcion del usuario mediante el id
        // $address = Address::create([
        //     'addres_add' => $data['addres_add'],
        //     'id_user_add' => $user->id,
        // ]);

        // // Guarda los contactos y la dirección
        // $contacts->save();
        // $address->save();

        // Asignar el rol al usuario si existe
        // if ($role) {
        //     $user->assignRole($role);
        // }
        // if ($roleName === 'coordinador') {
        //     return redirect()->route('/home');
        // } else {
        //     return redirect()->route('bibliotecarios.index');
        // }
    }
}
