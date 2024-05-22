<?php 
namespace App\Http\Controllers;

use App\Models\Users;

class FilterController extends Controller

{
    public function show($id)
    {
        $service = Users::with('Users', 'environment', 'equipment')->find($id);
       
        return view('service.show', compact('service'));
    }


}

