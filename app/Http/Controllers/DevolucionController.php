<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use App\Models\Equipment;
use App\Models\Service;
use App\Models\Users; // Se cambia Users a User para seguir las convenciones de nomenclatura de Laravel
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevolucionController extends Controller
{
    public function devolver(Request $request)
    {
        // Buscar el usuario por su número de identificación
        $user = Users::where('number_identification', $request->number_identification)->first();

        // Buscar el equipo por su serie
        $equipment = Equipment::where('serie_equi', $request->serie_equi)->first();

        // Buscar el ambiente por su nombre
        $environment = Environment::where('names', $request->names)->first();
      
        // Iniciar una transacción de base de datos
        DB::beginTransaction();

        try {
            // Verificar si el usuario, el equipo y el ambiente existen
            if (!$user || !$equipment || !$environment) {
                throw new \Exception('Usuario, equipo o ambiente no encontrados.');
            }

            // Verificar si el equipo está en préstamo
            if ($equipment->states !== 'en_prestamo') {
                throw new \Exception('El equipo no está marcado como prestado.');
            }

            // Verificar si el usuario tiene este equipo en préstamo
            $service = Service::where('user_id', $user->id)
                              ->where('equipment_id', $equipment->id)
                              ->where('state_ser', 'prestado')
                              ->first();

            // if (!$service) {
            //     throw new \Exception('El usuario no tiene este equipo en préstamo.');
            // }
            
            // Validar que el usuario que está devolviendo el equipo sea el mismo que lo prestó
            if ($service->user_id !== $user->id) {
                throw new \Exception('El usuario que está devolviendo el equipo no es el mismo que lo prestó.');
            }

            // Marcar el servicio como devuelto
            $service->state_ser = 'devuelto';
            $service->save();

            // Actualizar el estado del equipo a "disponible"
            $equipment->states = 'disponible';
            $equipment->save();

            // Actualizar el estado del usuario según sea necesario
            // Por ejemplo, si el usuario no tiene más equipos en préstamo, puedes cambiar su estado a 'sin_equipos'

            DB::commit();

            return redirect()->route('home')->with('success', 'El equipo se ha devuelto correctamente.');
        } catch (\Exception $e) {
            // Revertir la transacción si ocurre algún error
            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage()); 
        }
    }
}
