<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

use App\Models\Contacto;

use App\Models\direccion;
use App\Models\uniones;
use App\Models\Relacion;
use App\Models\ficha;
use App\Models\Programa;

/**
 * Class UsuarioController
 * @package App\Http\Controllers
 */
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::paginate(10);

        return view('usuario.index', compact('usuarios'))->with('i', (request()->input('page', 1) - 1) * $usuarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programas = Programa::where('estados', 'activo')->get();
        $fichas = ficha::where('estados', 'activo')->get();
        $usuario = new Usuario();
        return view('usuario.create', compact('usuario', 'fichas', 'programas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Usuario::$rules);
        $usuario = Usuario::create($request->all());
        $rolId = $request->input('roles_id');
        $programaid = $request->input('programa_id');
        $fichaid = $request->input('ficha_id');

        $union = new Uniones();
        $union->usuarios_id = $usuario->id;
        $union->roles_id = $rolId;
        $union->save();

        $relacion = new Relacion();
        $relacion->user_rel_id = $usuario->id;
        $relacion->programa_id = $programaid;
        $relacion->ficha_id = $fichaid;
        $relacion->save();

        $contacto = Contacto::create([
            'correo' => $request->input('correo'),
            'telefono' => $request->input('telefono'),
            'user_id' => $usuario->id,
        ]);

        $direccion = direccion::create([
            'ciudad' => $request->input('ciudad'),
            'usuario_id' => $usuario->id,
        ]);

        $contacto->save();
        $direccion->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario created successfully.');
    }


    public function show($id)
    {

        $usuario = Usuario::with('datos', 'contactos', 'direcciones')->find($id);

        return view('usuario.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = Usuario::find($id);

        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        request()->validate(Usuario::$rules);

        $usuario->update($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Usuario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id)->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario deleted successfully');
    }
}
