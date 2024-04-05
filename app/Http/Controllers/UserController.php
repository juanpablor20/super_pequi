<?php

namespace App\Http\Controllers;

use App\Models\Logins;
use Illuminate\Support\Facades\Hash;
use App\Models\Address;
use App\Models\Contacts;
use App\Models\Users;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class UserController extends Controller
{
 
    public function index()
    {
        $rol_users = Role::where('name', 'aprendices', 'instructor')->where('guard_name', 'web')->first();
        return $rol_users;
        if ($rol_users){
            $users = Users::role($rol_users)->paginate(10);
            $i = ($users->currentPage() -1) * $users->perPage();
            return view('user.index', compact('users', 'i'));
        } 
        // $users = Users::paginate(10);

        // return view('user.index', compact('users'))
        //     ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
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

       
        $contacts->save();
        $address->save();

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
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

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = Users::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}

