<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use App\Models\Equipment;
use App\Models\Service;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DevolucionController extends Controller
{
    public function devolver(Request $request)
    {


        $user = Users::where('number_identification', $request->number_identification)->first();
        $equipment = Equipment::where('serie_equi', $request->serie_equi)->first();
        $environment = Environment::where('names', $request->names)->first();
      
        // Encuentra el servicio basado en el ID proporcionado en la solicitud
       // $service = Service::findOrFail($request->service_id);

        // Inicia una transacción de base de datos
        DB::beginTransaction();

        try {
            // Crear el servicio con el usuario, el equipo y la fecha actual
            $service = new Service();
            $service->librarian_id = Auth::id();
            $service->user_id = $user->id;
            $service->equipment_id = $equipment->id;
            $service->environment_id = $environment->id;
            $service->date_ser = Carbon::now(); // Fecha y hora actual
            $service->state_ser = 'devuelto'; // Asumo que 'prestado' es el estado de un préstamo activo
            $service->save();

            // Actualizar el estado del equipo a "en_prestamo"
            $equipment->states = 'disponible';
            $equipment->save();

            // Actualizar el estado del usuario a "with_equipment"
            $user->states = 'with_equipment';
            $user->save();

            DB::commit();

            return redirect()->route('home')->with('success', 'Servicio creado exitosamente.');
        } catch (\Exception $e) {
            // Revertir la transacción si ocurre algún error
            DB::rollback();

            return $e->getMessage(); 
    }


}
}