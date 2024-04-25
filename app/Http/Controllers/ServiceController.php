<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Takielias\TablarKit\Facades\TablarKit;

class ServiceController extends Controller
{
    public function show($id)
    {
        $service = Service::with('Users', 'equipment')->find($id);
         
        return view('service.show', compact('service'));
    }
 
    function search(): JsonResponse
{
    $responseSchema = [
        'item_id' => 'id',
        'item_name' => 'names',
    ];

    $query = Environment::where('states', 'active');
    $data = TablarKit::searchItem($query, $responseSchema);
    return response()->json($data);
}
}
