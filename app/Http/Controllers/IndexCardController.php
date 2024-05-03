<?php

namespace App\Http\Controllers;

use App\Models\IndexCard;
use App\Models\program;
use Illuminate\Http\Request;


class IndexCardController extends Controller
{

    public function index()
    {
        $indexCards = IndexCard::paginate(10);
        return view('index-card.index', compact('indexCards'))
            ->with('i', (request()->input('page', 1) - 1) * $indexCards->perPage());
    }



    public function create()
    {
       
        $indexCard = new IndexCard();
        return view('index-card.create', compact('indexCard'));
    }

    public function store(Request $request)
    {

        request()->validate(IndexCard::$rules);
        $numeroFicha = $request->input('number');
        $existe = IndexCard::where('number', $numeroFicha)->exists();
        if ($existe) {
            // El número de documento ya existe en la base de datos
            //return true;
            return redirect()->back()->with('error', 'El número de ficha ya Existe.');
        }
        $indexCard = IndexCard::create($request->all());



        return redirect()->route('indexcards.index')
            ->with('success', 'Registro exitoso.');
    }

    public function show($id)
    {
        $indexCard = IndexCard::find($id);

        return view('index-card.show', compact('indexCard'));
    }

    public function edit($id)
    {
        $indexCard = IndexCard::find($id);
        $programa = program::all();
        //return $indexCard;
        $programas = $indexCard->programs;

        return view('index-card.edit', compact('indexCard'));
    }

    public function update(Request $request, IndexCard $indexCard)
    {
        request()->validate(IndexCard::$rules);

        $indexCard->update($request->all());

        return redirect()->route('indexcards.index')
            ->with('success', 'ficha Actualizada exitosamente');
    }

    public function destroy($id)
    {

        $indexCard = IndexCard::find($id)->delete();
        return $indexCard;
        return redirect()->route('indexcards.index')
            ->with('success', 'Ficha Inactivada Exitosamente');
    }
}
