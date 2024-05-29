<?php
namespace App\Http\Controllers;

use App\Events\DisabilityReportCreated;
use App\Events\SancionFinalizada;
use App\Models\Disability;
use App\Models\Service;
use App\Tables\ReportesTable;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DisabilityController extends Controller
{
    public function index(ReportesTable $table, Request $request)
    {
        if ($request->expectsJson()) {
            return $table->getData($request);
        }
        return view('disability.index', compact('table'));
    }

    public function create(Request $request)
    {
        $serviceId = $request->input('service_id', session('serviceId'));
        $disability = new Disability();

        return view('disability.create', compact('disability', 'serviceId'));
    }

    public function store(Request $request)
    {
        $currentDate = Carbon::now()->startOfDay();

        if (Carbon::parse($request->input('end_date'))->startOfDay()->lessThan($currentDate)) {
            return redirect()->back()->with('error', 'La fecha de finalización debe ser posterior a la fecha actual');
        }

        $request->validate([
            'description' => 'required|string',
            'end_date' => 'nullable|date',
        ]);

        $service = Service::find($request->input('service_id'));

        $disability = Disability::create([
            'description' => $request->input('description'),
            'end_date' => $request->input('end_date'),
            'service_id' => $request->input('service_id'),
        ]);

        $this->checkAndFireEndDateEvent($disability);

        $disability->punishment_date = Carbon::now();
        $disability->save();

        event(new DisabilityReportCreated($service));

        return redirect()->route('disabilities.index')->with('success', 'Reporte Creado con exito.');
    }

    protected function checkAndFireEndDateEvent(Disability $disability)
    {
        $endDateFromDB = Carbon::parse($disability->end_date)->startOfDay();
        $currentDate = Carbon::now()->startOfDay();
    
        if ($endDateFromDB->lessThanOrEqualTo($currentDate)) {
            $disability->status = 'inactivo'; // Cambia el estado a 'inactivo'
            $disability->save();
    
            event(new SancionFinalizada($disability->id));
        }
    }
    
    

    public function show($id)
    {
        $disability = Disability::findOrFail($id);
        return view('disability.show', compact('disability'));
    }

    public function edit($id)
    {
        $disability = Disability::findOrFail($id);
        return view('disability.edit', compact('disability'));
    }

    public function update(Request $request, Disability $disability)
    {
        $request->validate(Disability::$rules);

        $disability->update($request->all());

        return redirect()->route('disabilities.index')->with('success', 'Disability updated successfully');
    }

    public function destroy($id)
    {
        Disability::findOrFail($id)->delete();

        return redirect()->route('disabilities.index')->with('success', 'Disability deleted successfully');
    }
}


