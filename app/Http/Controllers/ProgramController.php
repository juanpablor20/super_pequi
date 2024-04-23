<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;


class ProgramController extends Controller
{
 
    public function index()
    {
        $programs = Program::paginate(10);

        return view('program.index', compact('programs'))
            ->with('i', (request()->input('page', 1) - 1) * $programs->perPage());
    }

  
    public function create()
    {
        $program = new Program();
        return view('program.create', compact('program'));
    }

    public function store(Request $request)
    {
        request()->validate(Program::$rules);

        $program = Program::create($request->all());

        return redirect()->route('programs.index')
            ->with('success', 'Programa creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::find($id);

        return view('program.show', compact('program'));
    }

    
    public function edit($id)
    {
        $program = Program::find($id);

        return view('program.edit', compact('program'));
    }

   
    public function update(Request $request, Program $program)
    {
        request()->validate(Program::$rules);

        $program->update($request->all());

        return redirect()->route('programs.index')
            ->with('success', 'Programa actualizado exitosamente');
    }

 
    public function destroy($id)
    {
        $program = Program::find($id)->delete();

        return redirect()->route('programs.index')
            ->with('success', 'Programa eliminado exitosamente');
    }
}