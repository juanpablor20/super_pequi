<?php

namespace App\Http\Controllers;

use App\Models\Disability;
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

        if (!$usuario) {
            return redirect()->route('home')->with('error', 'El usuario no existe en nuestro sistema.');
        }
        
        $number_identification = $request->input('number_identification');
        $user = Users::where('number_identification', $number_identification)->first();
        $userId = $user->id;
        $equipmentId = $request->input('equipment_id');

        // Verificar si el usuario ya tiene un préstamo activo para el mismo equipo
        $existingLoan = Service::where('user_borrower_id', $userId)
                            ->where('equipment_id', $equipmentId)
                            ->whereNull('return_ser') // Suponiendo que `return_date` es nulo si el préstamo está activo
                            ->first();

        if ($existingLoan) {
            return redirect()->back()->withErrors(['equipment_id' => 'Ya tienes un préstamo activo para este equipo.']);
        }

        // Verificar si el usuario está sancionado
        $serviceIds = Service::where('user_borrower_id', $userId)->pluck('id');
        $resultado = Disability::whereIn('service_id', $serviceIds)
            ->where('status', 'activo')
            ->exists();

        if ($resultado) {
            return redirect()->back()->with('error', 'El usuario se encuentra sancionado');
        }

        $equipment = $this->findEquipmentBySerie($request->serie_equi);
        $environment = $this->findEnvironmentByName($request->names);

        if (!$equipment) {
            return redirect()->route('home')->with('error', 'El equipo no existe en nuestro sistema.');
        } elseif (!$this->isEquipmentAvailable($equipment)) {
            return redirect()->route('home')->with('error', 'El equipo no está disponible para préstamo.');
        } elseif (!$environment) {
            return redirect()->back()->with('error', 'El lugar de traslado no existe');
        } elseif ($this->userHasSimilarEquipmentBorrowed($usuario, $equipment)) {
            return redirect()->route('home')->with('error', 'El usuario ya tiene un equipo del mismo tipo prestado.');
        }

        // Iniciar una transacción de base de datos
        DB::beginTransaction();

        try {
            $serviceId = $this->createService($usuario, $equipment, $environment);
            $this->updateEquipmentState($equipment, 'en_prestamo');
            $this->updateUserState($usuario, 'with_equipment');

            DB::commit();

            return redirect()->route('home')->with('success', 'Préstamo creado exitosamente.');
        } catch (\Exception $e) {
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
        // Busco servicios del usuario para el mismo tipo de equipo prestado
        $similarServices = Service::where('user_borrower_id', $user->id)
            ->whereHas('equipment', function ($query) use ($equipment) {
                $query->where('type_equi', $equipment->type_equi);
            })
            ->whereNull('return_ser') // Suponiendo que `return_ser` es nulo si el préstamo está activo
            ->count();
        return $similarServices > 0;
    }

    private function createService($user, $equipment, $environment)
    {
        $service = new Service();
        $service->librarian_borrower_id = Auth::id();
        $service->user_borrower_id = $user->id;
        $service->equipment_id = $equipment->id;
        $service->environment_id = $environment->id;
        $service->date_ser = Carbon::now();
        $service->status = 'pendiente';
        $service->save();

        return $service->id;
    }

    public function verificarPrestamosExpirados()
    {
        $prestamosExpirados = Service::where('date_ser', '<', Carbon::now()->subHours(1))
            ->whereNull('return_ser')
            ->get();

        if ($prestamosExpirados->isNotEmpty()) {
            return redirect()->route('home')->with('error', 'Hay préstamos expirados.');
        }
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
