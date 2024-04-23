<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Service;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrestamosController extends Controller
{   
    public function store(Request $request)
    {
       // request()->validate(Service::$rules);
        $usuario = Users::where('number_identification', $request->number_identification)->first();
        $equipment = Equipment::where('serie_equi', $request->serie_equi)->first();

        if (!$equipment) {
          return redirect()->route('home')->with('error', 'el usuario no existe en nuestro sistema.');
         // return response()->json(['error' => '¡El equipo no existe en nuestro sistema!'], 422);
        } 
        if (!$usuario) {
            return redirect()->route('home')->with('error', 'el usuario no existe en nuestro sistema.');
        }
        if ($equipment && $equipment->states == 'disponible') {
           
         
        } else {
            return redirect()->route('home')->with('error', 'este equipo no se enccuentra disponible.');
          
        }
   
        // Iniciar una transacción de base de datos
        DB::beginTransaction();

        try {
            // Crear el servicio con el usuario, el equipo y la fecha actual
            $service = new Service();
            $service->librarian_id = Auth::id();
            $service->user_id = $usuario->id;
            $service->equipment_id = $equipment->id;
            $service->date_ser = Carbon::now(); // Fecha y hora actual
            $service->state_ser = 'prestado'; // Asumo que 'prestado' es el estado de un préstamo activo

            $service->save();

            // Actualizar el estado del equipo a "en_prestamo"
            $equipment->states = 'en_prestamo';
            $equipment->save();

            // Actualizar el estado del usuario a "with_equipment"
            $usuario->states = 'with_equipment';
            $usuario->save();

            DB::commit();

            return redirect()->route('mostrarServicio', ['id' => $service->id])->with('success', 'Prestamo creado exitosamente.');
        } catch (\Exception $e) {
            // Revertir la transacción si ocurre algún error
            DB::rollback();

            return $e->getMessage(); // Manejar el error de alguna manera
        }
    }
    public function buscarUsuario(Request $request)
{
    $user = Users::where('number_identification', $request->input('numberIdentification'))->first();

    if ($user) {
        return response()->json([
            'names' => $user->names,
            'last_name' => $user->last_name,
            //'prestamos' => $user->prestamos, // Ajusta esto según la relación de préstamos de tu modelo de usuario
        ]);
    } else {
        return response()->json(['error' => 'Usuario no encontrado'], 404);
    }
}


}

