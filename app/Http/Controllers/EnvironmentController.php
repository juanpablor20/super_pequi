<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use Illuminate\Http\Request;

/**
 * Class EnvironmentController
 * @package App\Http\Controllers
 */
class EnvironmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $environments = Environment::paginate(10);

        return view('environment.index', compact('environments'))
            ->with('i', (request()->input('page', 1) - 1) * $environments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $environment = new Environment();
        return view('environment.create', compact('environment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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
