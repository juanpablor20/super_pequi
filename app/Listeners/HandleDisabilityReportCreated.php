<?php

namespace App\Listeners;

use App\Events\DisabilityReportCreated;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HandleDisabilityReportCreated implements ShouldQueue
{
    public function handle(DisabilityReportCreated $event)
    {
        $service = $event->service;

        // Marcar el equipo asociado como devuelto
        $equipment = $service->equipment;
        $equipment->states = 'disponible';
        $equipment->save();

        // Actualizar el estado del servicio
        $service->return_ser = Carbon::now();
        $service->status = 'devuelto';

        $service->save();
    }
}
