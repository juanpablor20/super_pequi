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
        $usuario = Users::where('number_identification', $request->number_identification)->first();
        $equipment = Equipment::where('serie_equi', $request->serie_equi)->first();

        // Verificar si el usuario ya tiene un préstamo activo del mismo tipo de equipo
        $prestamo_existente = Service::where('user_id', $usuario->id)
            ->where('state_ser', 'prestado') // Asumo que 'prestado' es el estado de un préstamo activo
            ->whereHas('equipment', function ($query) use ($equipment) {
                $query->where('type_equi', $equipment->type_equi);
            })
            ->exists();

        if ($prestamo_existente) {
            // Redirigir al usuario a otra vista
            return redirect()->route('home')->with('error', 'Ya tienes un préstamo activo de este tipo de equipo.');
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

            return redirect()->route('home')->with('success', 'Servicio creado exitosamente.');
        } catch (\Exception $e) {
            // Revertir la transacción si ocurre algún error
            DB::rollback();

            return $e->getMessage(); // Manejar el error de alguna manera
        }
    }

    // Otros métodos del controlador...
}

