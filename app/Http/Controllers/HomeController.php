<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use App\Models\Service;
use DragonCode\Contracts\Cashier\Auth\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        
        $user = auth()->user();
        $services = Service::where('status', 'pendiente')->get();

        
        return view('home', compact('services', 'user'))

            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
