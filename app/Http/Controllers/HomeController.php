<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        

        $services = Service::where('status', 'pendiente')->get();


        return view('home', compact('services'))

            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
