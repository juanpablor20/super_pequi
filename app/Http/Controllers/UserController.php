<?php

namespace App\Http\Controllers;

use App\Models\Logins;
use Illuminate\Support\Facades\Hash;
use App\Models\Address;
use App\Models\Contacts;
use App\Models\Users;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\URL;

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
        $user = new Users();
        return view('user.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate(Users::$rules);

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
            $user->assignRole('aprendices'); // Asignar el rol de "aprendiz"
        } elseif ($role == 'instructor') {
            $user->assignRole('instructor'); // Asignar el rol de "instructor"
        }

        $contacts->save();
        $address->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = Users::find($id);
        return view('user.show', compact('user'));
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
        $request->validate(Users::$rules);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = Users::find($id)->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
