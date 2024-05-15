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
        // Buscar el equipo por su serie
        $equipment = Equipment::where('serie_equi', $request->serie_equi)->first();
        if (!$equipment) {
            return redirect()->route('home')->with('error', 'El Equipo no Existe.');
        }

        // Verificar si el equipo está en préstamo
        if ($equipment->states !== 'en_prestamo') {
            return redirect()->route('home')->with('error', 'El equipo no está marcado como prestado.');
        }

        // Obtener el servicio asociado al equipo
        $service = Service::where('equipment_id', $equipment->id)
            ->where('status', 'pendiente')
            ->first();

        // Obtener el usuario que realizó el préstamo
        $borrowerUser = Users::find($service->user_borrower_id);

        // Verificar si el usuario que devuelve el equipo es diferente al que lo prestó
        if ($borrowerUser->id !== Auth::id()) {
            // Si es diferente, guardar el ID del usuario que devuelve el equipo
            $service->librarian_returner_id = Auth::id();
            $service->save();

            // Mandar una alerta
            session()->flash('different_user_alert', true);
        }

        // Marcar el equipo como devuelto y registrar la fecha y hora de devolución
        DB::beginTransaction();
        try {
            // Marcar el equipo como devuelto
            $equipment->states = 'disponible';
            $equipment->save();

            // Registrar la fecha y hora de devolución
            $returnDate = Carbon::now();
            $service->status = 'devuelto';
            $service->return_ser = $returnDate;
            $service->save();

            DB::commit();

            return redirect()->route('home')->with('success', 'El equipo se ha devuelto correctamente.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
