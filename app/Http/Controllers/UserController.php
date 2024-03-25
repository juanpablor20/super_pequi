<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\contacts;
use App\Models\Users;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::paginate(10);

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }


    public function create()
    {
        $user = new Users();
        return view('user.create', compact('user'));
    }

  
    public function store(Request $request)
    {
        // request()->validate(Users::$rules);

        $user = Users::create($request->all());

        $contacts = contacts::create([
            'email_con' => $request->input('email_con'),
            'telephone_con' => $request->input('telephone_con'),
            'id_user_con' => $user->id,
        ]);
        $address  = Address::create([
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

        $user = Users::findOrFail($id);
    $contact = $user->contact;

    $user = Users::findOrfail($id);
    $address  = $user->address;

        return view('user.edit', compact('user', 'contact', 'address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $user)
    {
        request()->validate(Users::$rules);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = Users::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
