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
        // Buscar el usuario por su número de identificación
        $user = Users::where('number_identification', $request->number_identification)->first();

        // Verificar si el usuario existe
        if (!$user) {
            return redirect()->route('home')->with('error', 'El usuario no existe.');
        }

        // Buscar el equipo por su serie
        $equipment = Equipment::where('serie_equi', $request->serie_equi)->first();
        if (!$equipment) {
            return redirect()->route('home')->with('error', 'El Equipo no Existe.');
        }

        // Buscar el ambiente por su nombre
        $environment = Environment::where('names', $request->names)->first();

        // Verificar si el ambiente existe
        if (!$environment) {
            return redirect()->route('home')->with('error', 'El ambiente no existe.');
        }

        // Verificar si el equipo está en préstamo
        if ($equipment->states !== 'en_prestamo') {
            return redirect()->route('home')->with('error', 'El equipo no está marcado como prestado.');
        }

        // Buscar el servicio asociado a este equipo y usuario

        $service = Service::where('user_borrower_id', $user->id)
            ->where('equipment_id', $equipment->id)
            ->where('status', 'pendiente')
            ->first();

        // Validar que el usuario que está devolviendo el equipo sea el mismo que lo pres
        if (!$service) {

            $servicio = Service::where('equipment_id', $equipment->id)->where('status', 'pendiente')->first();
            $serviceId = $servicio->id;
            session()->flash('serviceId', $serviceId);

            return redirect()->route('disabilities.create');
           // return redirect()->back()->with('message2', 'ocurrio un error');
        }

        // $serviceId = $service->id; 
        // return redirect()->route('disabilities.create', ['serviceId' => $serviceId]);

        // Marcar el servicio como devuelto y registrar la fecha y hora de devolución
        DB::beginTransaction();
        try {
            $service->status = 'devuelto';
            $service->return_ser = Carbon::now();
            $service->librarian_returner_id = Auth::id();
            $service->save();

            // Actualizar el estado del equipo a "disponible"
            $equipment->states = 'disponible';
            $equipment->save();



            // Actualizar el estado del usuario según sea necesario

            DB::commit();

            return redirect()->route('home')->with('success', 'El equipo se ha devuelto correctamente.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
