<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use App\Tables\AmbientesTable;
use Illuminate\Http\Request;

class EnvironmentController extends Controller
{

    public function index(Request $request)
    {
        $table = new AmbientesTable();

        if ($request->expectsJson())
            return $table->getData($request);
        return view('environment.index', compact('table'));
    }


    public function create()
    {
        $environment = new Environment();
        return view('environment.create', compact('environment'));
    }


    public function store(Request $request)
    {
        request()->validate(Environment::$rules);

        $environment = Environment::create($request->all());

        return redirect()->route('environments.index')
            ->with('success', 'Ambiente creado exitosamente.');
    }




    public function edit($id)
    {
        $environment = Environment::find($id);

        return view('environment.edit', compact('environment'));
    }


    public function update(Request $request, Environment $environment)
    {
        request()->validate(Environment::$rules);

        $environment->update($request->all());

        return redirect()->route('environments.index')
            ->with('success', 'Ambiente Actualizado Exitosamnete');
    }

    public function destroy($id)
    {
        $environment = Environment::find($id)->delete();

        return redirect()->route('environments.index')
            ->with('success', 'Ambiente Inactivado Exitosamente');
    }
}
