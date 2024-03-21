<?php

namespace App\Http\Controllers;

use App\Models\Computo;
use Illuminate\Http\Request;

/**
 * Class ComputoController
 * @package App\Http\Controllers
 */
class ComputoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computos = Computo::paginate(10);

        return view('computo.index', compact('computos'))
            ->with('i', (request()->input('page', 1) - 1) * $computos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $computo = new Computo();
        return view('computo.create', compact('computo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Computo::$rules);

        $computo = Computo::create($request->all());

        return redirect()->route('computos.index')
            ->with('success', 'Computo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $computo = Computo::find($id);

        return view('computo.show', compact('computo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $computo = Computo::find($id);

        return view('computo.edit', compact('computo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Computo $computo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Computo $computo)
    {
        request()->validate(Computo::$rules);

        $computo->update($request->all());

        return redirect()->route('computos.index')
            ->with('success', 'Computo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $computo = Computo::find($id)->delete();

        return redirect()->route('computos.index')
            ->with('success', 'Computo deleted successfully');
    }
}
