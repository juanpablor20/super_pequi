<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show($id)
    {
        $service = Service::with('Users', 'equipment')->find($id);
         
        return view('service.show', compact('service'));
    }
}
