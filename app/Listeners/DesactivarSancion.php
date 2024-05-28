<?php

namespace App\Listeners;

use App\Events\SancionFinalizada;
use App\Models\Disability;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DesactivarSancion
{
    public function handle(SancionFinalizada $event)
    {
        $sancionId = $event->sancionId;

        $reporte = Disability::findOrFail($sancionId);

        // Desactivar el reporte (marcarlo como inactivo)
        $reporte->activo =  'inactivo';
        $reporte->save();
    }
}
