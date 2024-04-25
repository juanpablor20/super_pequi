<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;


class EquipmentController extends Controller
{
    public function index()

    {
        
        $equipment = Equipment::paginate(10);
        return view('equipment.index', compact('equipment'))
            ->with('i', (request()->input('page', 1) - 1) * $equipment->perPage());
    }
   

  
    public function create()
    {
        $equipment = new Equipment();
        return view('equipment.create', compact('equipment'));
    }


    public function store(Request $request)
    {
        request()->validate(Equipment::$rules);

        $equipment = Equipment::create($request->all());

        return redirect()->route('equipment.index')
            ->with('success', 'Equipo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipment = Equipment::find($id);

        return view('equipment.show', compact('equipment'));
    }


    public function edit($id)
    {
        $equipment = Equipment::find($id);

        return view('equipment.edit', compact('equipment'));
    }

   
    public function update(Request $request, Equipment $equipment)
    {
        request()->validate(Equipment::$rules);
        $equipment->update($request->all());

        return redirect()->route('equipment.index')
            ->with('Exito', 'Equipo Actualizado exitosamente');
    }

    public function destroy($id)
    {
        $equipment = Equipment::find($id);
    
        // Verificar si el equipo fue encontrado
        if (!$equipment) {
            return redirect()->route('equipment.index')->with('error', 'Equipo no encontrado');
        }
    
        // Cambiar el estado a 'inactivo'
        $equipment->states = 'inactivo';
        $equipment->save();
    
        return redirect()->route('equipment.index')->with('success', 'Equipo inactivado exitosamente');
    }
    
}
