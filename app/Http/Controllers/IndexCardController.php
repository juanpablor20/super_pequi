<?php

namespace App\Http\Controllers;

use App\Models\IndexCard;
use Illuminate\Http\Request;

/**
 * Class IndexCardController
 * @package App\Http\Controllers
 */
class IndexCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indexCards = IndexCard::paginate(10);

        return view('index-card.index', compact('indexCards'))
            ->with('i', (request()->input('page', 1) - 1) * $indexCards->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $indexCard = new IndexCard();
        return view('index-card.create', compact('indexCard'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(IndexCard::$rules);

        $indexCard = IndexCard::create($request->all());

        return redirect()->route('index-cards.index')
            ->with('success', 'IndexCard created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $indexCard = IndexCard::find($id);

        return view('index-card.show', compact('indexCard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indexCard = IndexCard::find($id);

        return view('index-card.edit', compact('indexCard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  IndexCard $indexCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IndexCard $indexCard)
    {
        request()->validate(IndexCard::$rules);

        $indexCard->update($request->all());

        return redirect()->route('index-cards.index')
            ->with('success', 'IndexCard updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $indexCard = IndexCard::find($id)->delete();

        return redirect()->route('index-cards.index')
            ->with('success', 'IndexCard deleted successfully');
    }
}
