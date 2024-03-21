<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\Addres;

class AdminController extends Controller
{
   
    public function index()
    {
        $admins = Admin::paginate(10);

        return view('admin.index', compact('admins'))
            ->with('i', (request()->input('page', 1) - 1) * $admins->perPage());
    }

    
    public function create()
    {
        $admin = new admin();
        return view('admin.create', compact('admin'));
    }

    
    public function store(Request $request)
    {
  request()->validate(admin::$rules);
        $admin = admin::create($request->all());

        $contact = Contact::create([
            'email_con' => $request->input('email_con'),
            'telephone_con' => $request->input('telephone_con'),
            'id_user_con' =>$admin->id
        ]);

        $Addres = Addres::create([
            'addres_add' => $request->input('addres_add'),
            'id_user_add' =>$admin->id
        ]);
        
           
        return redirect()->route('admins.index')->with('success', 'admin created successfully');;
    }
  
    public function show($id)
    {
        $admin = Admin::with('contactos', 'direciones')->find($id);

        return view('admin.show', compact('admin'));
    }
   

  
    public function edit($id)
    {
        $admin = Admin::find($id);

        return view('admin.edit', compact('admin'));
    }

    
    public function update(Request $request, Admin $admin)
{
    request()->validate(Admin::$rules);

    $admin->update($request->all());

    $admin->contactos()->update([
        'email_con' => $request->input('email_con'),
            'telephone_con' => $request->input('telephone_con'),
            'id_user_con' =>$admin->id
    ]);

    $admin->direciones()->update([
        'addres_add' => $request->input('addres_add'),
            'id_user_add' =>$admin->id
    ]);

    return redirect()->route('admins.index')
        ->with('success', 'Admin updated successfully');
}

public function destroy($id)
{
    $equipo = admin::find($id)->delete();

    return redirect()->route('admins.index')
        ->with('success', 'Equipo deleted successfully');
}




}
