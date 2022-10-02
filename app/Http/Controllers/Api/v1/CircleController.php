<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CircleController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'a' => 'required',
            'b' => 'required',
        ]);

        dd($validated);

        $data ['error'] = "Year not supplied";
        $data['status'] = true;
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }
}
