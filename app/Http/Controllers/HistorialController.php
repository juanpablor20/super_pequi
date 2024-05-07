<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Users;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function historico()
    {
        $librarianIds = Service::pluck('librarian_borrower_id');
        $librarians = Users::whereIn('id', $librarianIds)->get();
        
        $services = Service::paginate(10);
        $i = ($services->currentPage() - 1) * $services->perPage();

        return view('service.historico', compact('services', 'librarians', 'i'));
    } 
    

    public function filterService(Request $request)
    {
        $librarianIds = Service::pluck('librarian_id');
        $librarians = Users::whereIn('id', $librarianIds)->get();
        $query = Service::query();

        // Filtrar por tipo de servicio si se ha seleccionado uno
        if ($request->has('service_type')) {
            $serviceType = $request->input('service_type');
            if ($serviceType === 'prestamo') {
                $query->where('state_ser', 'prestado');
            } elseif ($serviceType === 'devolucion') {
                $query->where('state_ser', 'devuelto');
            }
        }
    
        // Obtener los servicios paginados después de aplicar los filtros
        $services = $query->paginate(10);
        $i = ($services->currentPage() - 1) * $services->perPage();
    
        return view('service.historico', compact('services', 'librarians', 'i'));
    }
}

