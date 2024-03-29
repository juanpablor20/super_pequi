<?php

namespace App\Http\Controllers;

use App\Models\Bibliotecario;
use App\Models\Users;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class BibliotecarioController extends Controller
{
    public function index()
    {
        $rol2 = Role::where('name', 'bibliotecario')->first();
        return view('bibliotecarios.form', ['bibliotecario' => $rol2]);


        // return view('bibliotecarios.index', compact('bibliotecarios'))
        //     ->with('i', (request()->input('page', 1) - 1) * $bibliotecarios->perPage());
        // Lógica para mostrar una lista de bibliotecarios
    }

    // public function create()
    
    // {
    //     $equipo = new Users();
    //     return view('bibliotecarios.create', compact('equipo'));
    //     // Lógica para mostrar el formulario de creación de un bibliotecario
    // }

    public function store(Request $request)
    {
        // Lógica para almacenar un nuevo bibliotecario en la base de datos
    }

    public function show($id)
    {
        // Lógica para mostrar los detalles de un bibliotecario específico
    }

    public function edit($id)
    {
        // Lógica para mostrar el formulario de edición de un bibliotecario
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar los detalles de un bibliotecario en la base de datos
    }

    public function destroy($id)
    {
        // Lógica para eliminar un bibliotecario de la base de datos
    }
}
