<?php

namespace App\Http\Controllers;

use App\Models\Disability;
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
    public function index()
    {
        $disabilities = Disability::paginate(10);

        return view('disability.index', compact('disabilities'))
            ->with('i', (request()->input('page', 1) - 1) * $disabilities->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $disability = new Disability();
        $serviceId = session('serviceId');
        return view('disability.create', compact('disability', 'serviceId'));
    }

    public function store(Request $request)
    {
     //   request()->validate(Disability::$rules);
    
     $disability = Disability::create([
        'description' => $request->input('description'),
        'status' => $request->input('status'),
        'punishment_date' => $request->input('punishment_date'),
        'end_date' => $request->input('end_date'),
        'service_id' => $request->input('service_id'),
    ]);
        $disability->save();

        return redirect()->route('disabilities.index')
            ->with('success', 'Disability created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disability = Disability::find($id);

        return view('disability.show', compact('disability'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disability = Disability::find($id);

        return view('disability.edit', compact('disability'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Disability $disability
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disability $disability)
    {
        request()->validate(Disability::$rules);

        $disability->update($request->all());

        return redirect()->route('disabilities.index')
            ->with('success', 'Disability updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $disability = Disability::find($id)->delete();

        return redirect()->route('disabilities.index')
            ->with('success', 'Disability deleted successfully');
    }
}
