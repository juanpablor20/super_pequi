<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Service;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::paginate(10);

        return view('service.index', compact('services'))
            ->with('i', (request()->input('page', 1) - 1) * $services->perPage());
    }

    public function create()
    {
        return view('service.create');
    }

    public function store(Request $request)
    {
        $usuario = Users::where('number_identification', $request->number_identification)->first();
        $equipment = Equipment::where('serie_equi', $request->serie_equi)->first();

        if (!$usuario) {
            return "El usuario no existe";
        }

        if (!$equipment) {
            return "Equipo no encontrado";
        }

        // Iniciar una transacción de base de datos
        DB::beginTransaction();

        try {
            // Crear el servicio con el usuario, el equipo y la fecha actual
            $service = new Service();
            $service->user_id = $usuario->id;
           // $service->equipment_id = $equipment->id;
            $service->date_ser = Carbon::now(); // Fecha y hora actual
            // Otros campos del servicio
            $service->save();

            // Confirmar la transacción si todo fue exitoso
            DB::commit();

            return redirect()->route('services.index')->with('success', 'Servicio creado exitosamente.');
        } catch (\Exception $e) {
            // Revertir la transacción si ocurre algún error
            DB::rollback();

            return $e->getMessage(); // Manejar el error de alguna manera
        }
    }

    public function show($id)
    {
        $service = Service::find($id);

        return view('service.show', compact('service'));
    }

    public function edit($id)
    {
        $service = Service::find($id);

        return view('service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            // Aquí debes definir las reglas de validación para la actualización de un servicio si es necesario
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')->with('success', 'Servicio actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Servicio eliminado exitosamente.');
    }
}
