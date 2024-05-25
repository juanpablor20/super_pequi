<?php

namespace App\Http\Controllers;

use App\Events\DisabilityReportCreated;
use App\Models\Disability;
use App\Models\Service;
use App\Tables\ReportesTable;
use Illuminate\Http\Request;

/**
 * Class DisabilityController
 * @package App\Http\Controllers
 */
class DisabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $table = new ReportesTable();

        if ($request->expectsJson())
            return $table->getData($request);
        return view('disability.index', compact('table'));
    }

    public function create(Request $request)
    {
        // Obtener el service_id de la URL si está presente
        $serviceId = $request->input('service_id');
    
        // Si no se encuentra en la URL, intenta obtenerlo de la sesión
        if (!$serviceId) {
            $serviceId = session('serviceId');
        }
    
        $disability = new Disability();
    
        return view('disability.create', compact('disability', 'serviceId'));
    }

    public function store(Request $request)
{
    // Validar los datos recibidos
    $request->validate([
        'description' => 'required|string',
        'status' => 'required|string',
        'punishment_date' => 'nullable|date',
        'end_date' => 'nullable|date',
        // 'service_id' => 'required|exists:services,id', // Asegurar que el servicio exista en la base de datos
    ]);

    $service = Service::find($request->input('service_id'));
    // Crear la discapacidad asociada al servicio
    $disability = Disability::create([
        'description' => $request->input('description'),
        'status' => $request->input('status'),
        'punishment_date' => $request->input('punishment_date'),
        'end_date' => $request->input('end_date'),
        'service_id' => $request->input('service_id'),
    ]);
    event(new DisabilityReportCreated($service));

    // Redireccionar a la página de índice de discapacidades
    return redirect()->route('disabilities.index')->with('success', 'Disability created successfully.');
}


    public function show($id)
    {
        $disability = Disability::find($id);

        return view('disability.show', compact('disability'));
    }


    public function edit($id)
    {
        $disability = Disability::find($id);

        return view('disability.edit', compact('disability'));
    }
    public function update(Request $request, Disability $disability)
    {
        request()->validate(Disability::$rules);

        $disability->update($request->all());

        return redirect()->route('disabilities.index')
            ->with('success', 'Disability updated successfully');
    }

    public function destroy($id)
    {
        $disability = Disability::find($id)->delete();

        return redirect()->route('disabilities.index')
            ->with('success', 'Disability deleted successfully');
    }
}
