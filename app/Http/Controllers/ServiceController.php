<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use App\Models\IndexCard;
use App\Models\Program;
use App\Models\Service;
use App\Models\Users;
use Illuminate\Http\JsonResponse;

use Takielias\TablarKit\Facades\TablarKit;

class ServiceController extends Controller
{
    public function show($id)
    {
        $service = Service::with('Users', 'environment', 'equipment')->find($id);
       
        return view('service.show', compact('service'));
    }

    function aulaSearch(): JsonResponse
    {
        $responseSchema = [
            'item_id' => 'id',
            'item_name' => 'names',
        ];

        $query = Environment::where('states', 'active');
        $data = TablarKit::searchItem($query, $responseSchema);
        return response()->json($data);
    }
    function programaSearch(): JsonResponse
    {
        $responseSchema = [
            'item_id' => 'id',
            'item_name' => 'names_pro',
            
            
        ];


        $data = TablarKit::searchItem(Program::query(), $responseSchema);
        return response()->json($data);
    }
}
