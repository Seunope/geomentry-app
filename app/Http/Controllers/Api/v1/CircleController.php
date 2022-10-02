<?php
namespace App\Http\Controllers\Api\v1;

use App\Models\Circle;
use App\Http\Controllers\Controller;
use App\Http\Requests\CircleRequest;

class CircleController extends Controller
{
    public function index(CircleRequest $request, $radius)
    {

        if(!is_numeric($radius)){
            $finalData['status'] = false;
            $finalData['message'] = 'Only numbers supported';
            $finalData['data'] = [];
            return response()->json($finalData, 400, [], JSON_PRETTY_PRINT);
        }

        if($radius < 0){
            $finalData['status'] = false;
            $finalData['message'] = 'Negative numbers not supported for area of a circle';
            $finalData['data'] = [];
            return response()->json($finalData, 400, [], JSON_PRETTY_PRINT);
        }

        $circle = new Circle();
        $area = $circle::SurfaceArea($radius);
        $circumference = $circle::Circumference($radius);

        $data ['type'] = "circle";
        $data ['radius'] = number_format($radius,1);
        $data ['surface'] = round($area, 2);
        $data ['circumference'] = round($circumference, 2);
        $data['unit'] = $request['unit'];

        $finalData['status'] = true;
        $finalData['message'] = 'action was successful';
        $finalData['data'] = $data;

        return response()->json($finalData, 200, [], JSON_PRETTY_PRINT);
    }
}
