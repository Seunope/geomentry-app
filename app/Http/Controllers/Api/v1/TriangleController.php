<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TriangleRequest;
use App\Models\Triangle;
use Illuminate\Http\Request;

class TriangleController extends Controller
{
    public function index(TriangleRequest $request, $height, $base, $side)
    {

        if(!is_numeric($height) || !is_numeric($base) |!is_numeric($side)){
            $finalData['status'] = false;
            $finalData['message'] = 'Only numbers supported';
            $finalData['data'] = [];
            return response()->json($finalData, 400, [], JSON_PRETTY_PRINT);
        }

        if($height < 0 || $base < 0 || $side < 0){
            $finalData['status'] = false;
            $finalData['message'] = 'Negative numbers not supported for area of a circle';
            $finalData['data'] = [];
            return response()->json($finalData, 400, [], JSON_PRETTY_PRINT);
        }

        $input['base'] =  $base;
        $input['side'] =  $height;
        $input['height'] =  $height;
        $triangle = new Triangle();
        $area = $triangle::SurfaceArea($height, $base);
        $circumference = $triangle::Circumference($height, $base, $side);

        $data ['type'] = "triangle";
        $data ['a'] = number_format($height, 1);;
        $data ['b'] = number_format($base,1);
        $data ['c'] = number_format($side,1);
        $data ['surface'] = number_format($area, 2);
        $data ['circumference'] = number_format($circumference, 2);
        $data['unit'] = $request['unit'];

        $finalData['status'] = true;
        $finalData['message'] = 'action was successful';
        $finalData['data'] = $data;

        return response()->json($finalData, 200, [], JSON_PRETTY_PRINT);
    }
}
