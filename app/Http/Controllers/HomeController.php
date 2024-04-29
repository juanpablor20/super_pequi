<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index()
    {
        //$environment = Environment::query()->pluck('names', 'id')->all();
        //return view('home');
        $services = Service::where('state_ser', 'prestado')
        ->whereHas('equipment', function ($query) {
            $query->where('states', 'en_prestamo');
        })
        ->get();
            

        return view('home', compact('services'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
