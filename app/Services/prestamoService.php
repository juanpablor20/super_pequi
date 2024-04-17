<?php


// app/Services/ServiceService.php

namespace App\Services;

use App\Models\Users;
use App\Models\Equipment;
use App\Models\Service;
use App\Models\services_uniones;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class prestamoService
{
    public function createService($requestData)
    {
        $usuario = Users::where('number_identification', $requestData->number_identification)->firstOrFail();
        $equipment = Equipment::where('serie_equi', $requestData->serie_equi)->firstOrFail();

        // Verificar estados de usuario y equipo
        $this->validateUserAndEquipment($usuario, $equipment);

        // Iniciar una transacción de base de datos
        DB::beginTransaction();

        try {
            // Crear el servicio
            $service = $this->createNewService($usuario);

            // Asociar el equipo al servicio
            $this->associateEquipmentToService($service, $equipment);

            // Actualizar estados de equipo y usuario
            $this->updateEquipmentAndUserStates($equipment, $usuario);

            // Confirmar la transacción
            DB::commit();

            return $service;
        } catch (\Exception $e) {
            // Revertir la transacción si ocurre algún error
            DB::rollback();

            throw $e;
        }
    }

    protected function validateUserAndEquipment($usuario, $equipment)
    {
        if (!$usuario) {

            return "El usuario no existe";
        }
        if (!$equipment) {
            return "Equipo no encontrado";
        }
        if ($equipment->states == 'inactive'){
            return "este equipo esta incactivo";
        }
        if ($equipment->states == 'en_reparacion'){
            return "este equipo actualmente se encuentra en reparacion";
        }
        if ($equipment->states == 'en_prestamo'){
            return "equipo actualmente en prestamo";
        }
        if ($usuario->states == 'inactive') {
            return "Este usuario está inactivo y no puede hacer un préstamo.";
        }

        if ($usuario->states == 'with_equipment') {
            return "Este usuario no puede hacer un préstamo porque ya tiene un equipo prestado.";
        }   // Lógica de validación del usuario y el equipo
    }

    protected function createNewService($usuario)
    {
        $service = new Service();
        $service->user_id = $usuario->id;
        $service->date_ser = Carbon::now();
        $service->save();

        return $service;
    }

    protected function associateEquipmentToService($service, $equipment)
    {
        $union = new services_uniones();
        $union->services_id = $service->id;
        $union->equipment_id = $equipment->id;
        $union->save();
    }

    protected function updateEquipmentAndUserStates($equipment, $usuario)
    {
        // Actualizar estados de equipo y usuario
    }
}
