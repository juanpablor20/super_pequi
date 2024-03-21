<?php

namespace App\Http\Controllers;

use App\Models\UsersBorrower;
use Illuminate\Http\Request;

/**
 * Class UsersBorrowerController
 * @package App\Http\Controllers
 */
class UsersBorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersBorrowers = UsersBorrower::paginate(10);

        return view('users-borrower.index', compact('usersBorrowers'))
            ->with('i', (request()->input('page', 1) - 1) * $usersBorrowers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usersBorrower = new UsersBorrower();
        return view('users-borrower.create', compact('usersBorrower'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(UsersBorrower::$rules);

        $usersBorrower = UsersBorrower::create($request->all());

        return redirect()->route('usersborrowers.index')
            ->with('success', 'UsersBorrower created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usersBorrower = UsersBorrower::find($id);

        return view('users-borrower.show', compact('usersBorrower'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usersBorrower = UsersBorrower::find($id);

        return view('users-borrower.edit', compact('usersBorrower'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  UsersBorrower $usersBorrower
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersBorrower $usersBorrower)
    {
        request()->validate(UsersBorrower::$rules);

        $usersBorrower->update($request->all());

        return redirect()->route('usersborrowers.index')
            ->with('success', 'UsersBorrower updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $usersBorrower = UsersBorrower::find($id)->delete();

        return redirect()->route('usersborrowers.index')
            ->with('success', 'UsersBorrower deleted successfully');
    }
}
