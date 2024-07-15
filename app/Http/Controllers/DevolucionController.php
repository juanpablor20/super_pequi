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
            return redirect()->route('home')->with('error', 'Equipo no esta en prestamo.');
        }

        $user = Users::where('number_identification', $request->number_identification)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Este usuario no exite en nuestro sistema');
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
            if ($borrowerUser->id !== $user->id) {
                // Guardar el ID del usuario que devuelve el equipo
                $service->user_returner_id = $user->id;
                $service->save();
                // Si el usuario que devuelve es un bibliotecario diferente al que prestó, guardar su ID también
                if ($user->role !== $borrowerUser->role) {
                    $service->different_librarian_id = $user->id;
                    $service->save();
                }
                // Mandar una alerta
                session()->flash('message2', true);

                return redirect()->route('disabilities.create', ['service_id' => $service->id]);
            }

            return redirect()->back()->with('success', 'El equipo se a marcado como devuelto.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
  


}
