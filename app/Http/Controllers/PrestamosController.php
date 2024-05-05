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

class PrestamosController extends Controller
{
    public function store(Request $request)
    {

        $usuario = $this->findUserByIdentification($request->number_identification);
        $equipment = $this->findEquipmentBySerie($request->serie_equi);
        $environment = $this->findEnvironmentByName($request->names);
        if (!$usuario) {
            return redirect()->route('home')->with('error', 'El usuario no existe en nuestro sistema.');
        } elseif (!$equipment) {
            return redirect()->route('home')->with('error', 'El equipo no existe en nuestro sistema.');
        } elseif (!$this->isEquipmentAvailable($equipment)) {
            return redirect()->route('home')->with('error', 'El equipo no está disponible para préstamo.');
        } elseif (!$environment) {
            return redirect()->back()->with('error', 'El lugar de traslado no Existe');
        } elseif ($this->userHasSimilarEquipmentBorrowed($usuario, $equipment)) {
            return redirect()->route('home')->with('error', 'El usuario ya tiene un equipo del mismo tipo prestado.');
        }

        // Iniciar una transacción de base de datos
        DB::beginTransaction();

        try {
            $this->createService($usuario, $equipment, $environment);
            $this->updateEquipmentState($equipment, 'en_prestamo');
            $this->updateUserState($usuario, 'with_equipment');

            DB::commit();

            return redirect()->route('home')->with('success', 'Préstamo creado exitosamente.');
        } catch (\Exception $e) {
            // Revertir la transacción si ocurre algún error
            DB::rollback();

            return redirect()->route('home')->with('error', 'Ha ocurrido un error al realizar el préstamo.');
        }
    }
    public function buscarUsuario(Request $request)
    {
        $user = $this->findUserByIdentification($request->input('numberIdentification'));

        if ($user) {
            return response()->json([
                'names' => $user->names,
                'last_name' => $user->last_name,
            ]);
        } else {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    }



    private function findUserByIdentification($identification)
    {
        return Users::where('number_identification', $identification)->first();
    }

    private function findEquipmentBySerie($serie)
    {
        return Equipment::where('serie_equi', $serie)->first();
    }

    private function findEnvironmentByName($name)
    {
        return Environment::where('names', $name)->first();
    }

    private function isEquipmentAvailable($equipment)
    {
        return $equipment && $equipment->states == 'disponible';
    }

    private function userHasSimilarEquipmentBorrowed($user, $equipment)
    {
        // Buscar servicios del usuario para el mismo tipo de equipo prestado
        $similarServices = Service::where('user_borrower_id', $user->id)
            ->whereHas('equipment', function ($query) use ($equipment) {
                $query->where('type_equi', $equipment->type_equi);
            })
            ->whereIn('status', ['pendiente', 'devuelto'])
            ->count();

        // Si encuentra al menos un servicio similar, significa que el usuario ya tiene un equipo del mismo tipo prestado
        return $similarServices > 0;
    }




    private function createService($user, $equipment, $environment)
    {
        $service = new Service();
        $service->librarian_borrower_id = Auth::id();
        $service->user_borrower_id = $user->id;
        $service->equipment_id = $equipment->id;
        $service->environment_id = $environment->id;
        $service->date_ser = Carbon::now(); // Fecha y hora actual
        $service->status = 'pendiente';

        $service->save();
    }

    private function updateEquipmentState($equipment, $state)
    {
        $equipment->states = $state;
        $equipment->save();
    }

    private function updateUserState($user, $state)
    {
        $user->states = $state;
        $user->save();
    }
}
