<?php

namespace App\Http\Controllers;

use App\Models\IndexCard;
use App\Models\programs;
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
        $programas = programs::all();
        $indexCard = new IndexCard();
        return view('index-card.create', compact('indexCard', 'programas'));
    }

    public function store(Request $request)
    {
        
        request()->validate(IndexCard::$rules);
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
        $programa = programs::all();
       //return $indexCard;
       $programas = $indexCard->programs;
        
        return view('index-card.edit', compact('indexCard', 'programas', 'programa'));
    }

    public function update(Request $request, IndexCard $indexCard)
    {
        request()->validate(IndexCard::$rules);

        $indexCard->update($request->all());

        return redirect()->route('indexcards.index')
            ->with('success', 'IndexCard updated successfully');
    }

    public function destroy($id)
    {
      
        $indexCard = IndexCard::find($id)->delete();
return $indexCard;
        return redirect()->route('indexcards.index')
            ->with('success', 'IndexCard deleted successfully');
    }
}
