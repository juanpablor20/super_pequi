<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Service;
use App\Models\services_uniones;
use App\Models\Users;
use App\Services\prestamoService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceController extends Controller
{
    public function index()
{
    $services = Service::with('Users', 'equipoUnion')->get();

    return view('service.index', compact('services'))
        ->with('i', (request()->input('page', 1) - 1) * 10);  
}
    

    public function create()
    {
        return view('service.create');
    }
    
// protected $serviceService;

// public function __construct(prestamoService $serviceService)
// {
//     $this->serviceService = $serviceService;
// }
    public function store(Request $request)
    {
        // $service = $this->serviceService->createService($request);
        
            
        $usuario = Users::where('number_identification', $request->number_identification)->first();
        $equipment = Equipment::where('serie_equi', $request->serie_equi)->first();
        // $equipment_id = $equipment->id; 
        if (!$usuario) {

            return "El usuario no existe";
        }
        if (!$equipment){
            return new JsonResponse(['error' => 'Este equipo actualmente no existe'], 422);
        }
        if ($equipment->states == 'inactive'){
            return "este equipo esta incactivo";
        }
        if ($equipment->states == 'en_reparacion'){
            return "este equipo actualmente se encuentra en reparacion";
        }
        if ($equipment->states == 'en_prestamo'){
            return new JsonResponse(['error' => 'Este equipo se encuentra en prestamo'], 422);
       }
        if ($usuario->states == 'inactive') {
            return "Este usuario está inactivo y no puede hacer un préstamo.";
        }

        if ($usuario->states == 'with_equipment') {
            return "Este usuario no puede hacer un préstamo porque ya tiene un equipo prestado.";
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
            $services_id = $service->id;
            $union = new services_uniones();
            $union->services_id = $service->id;
            $union->equipment_id = $equipment->id;
            $union->save();
            

            $equipment->states = 'en_prestamo';
            //return $equipment;
            $equipment->save();

            // Actualizar el estado del usuario a "with_equipment"
            $usuario->states = 'with_equipment';
            $usuario->save();
            // $service->equipoUnion()->attach($equipment->id);
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
