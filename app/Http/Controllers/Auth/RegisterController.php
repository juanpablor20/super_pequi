<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Contacts;
use App\Models\Logins;
use App\Models\Users;

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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $validator = $this->validator($data);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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

        $contacts = Contacts::create([
            'email_con' => $data['email_con'],
            'telephone_con' => $data['telephone_con'],
            'id_user_con' => $user->id,
        ]);

        $address = Address::create([
            'addres_add' => $data['addres_add'],
            'id_user_add' => $user->id,
        ]);

        if ($roleName = $data['role']) {
            $role = Role::where('name', $roleName)->first();
            if ($role) {
                $user->assignRole($role);
            }
        }

        Auth::login($login);

        // if ($roleName === 'coordinador') {
        //     return redirect()->route('home');
        // } else {
        //     return redirect()->route('bibliotecarios.index');
        // }
    }
}
