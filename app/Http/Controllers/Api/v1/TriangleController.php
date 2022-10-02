<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Triangle;
use Illuminate\Http\Request;
use App\Services\GeometryContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\TriangleRequest;

class TriangleController extends Controller
{
    public function index(Request $request, $height, $base, $side)
    {

        $isDataClean = $this->validInput($height, $base, $side);
        if(!$isDataClean['status']){
            return response()->json($isDataClean, 400, [], JSON_PRETTY_PRINT);
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

    public function sumShapeCalculation(TriangleRequest $request, GeometryContract $triangleService, $height1, $base1, $side1, $height2, $base2, $side2)
    {
        $isDataClean = $this->validInput($height1, $base1, $side1);
        if(!$isDataClean['status']){
            return response()->json($isDataClean, 400, [], JSON_PRETTY_PRINT);
        }

        $isDataClean = $this->validInput($height2, $base2, $side2);
        if(!$isDataClean['status']){
            return response()->json($isDataClean, 400, [], JSON_PRETTY_PRINT);
        }

        if($request->get('shape') !== 'triangle'){
            $disData['status'] = false;
            $disData['message'] = 'wrong shape type, expected triangle ';
            $disData['data'] = [];
            return response()->json($disData, 400, [], JSON_PRETTY_PRINT);
        }

        $shape1 = [
            'height' => $height1,
            'base' => $base1,
            'side' => $side1,
        ];

        $shape2 = [
            'height' => $height2,
            'base' => $base2,
            'side' => $side2,
        ];

        $resArea = $triangleService->sumAreasOfShapes($shape1, $shape2);
        $resCircumference = $triangleService->sumCircumferenceOfShapes($shape1, $shape2);

        $data ['type'] = "circle";
        $data ['shape1'] =  $shape1;
        $data ['shape2'] =  $shape2;
        $data ['sum_surface'] = round($resArea, 2);
        $data ['sum_circumference'] = round($resCircumference, 2);
        $data['unit'] = $request['unit'];

        $finalData['status'] = true;
        $finalData['message'] = 'action was successful';
        $finalData['data'] = $data;

        return response()->json($finalData, 200, [], JSON_PRETTY_PRINT);
    }



    private function validInput ($height, $base, $side){

        if(!is_numeric($height) || !is_numeric($base) |!is_numeric($side)){
            return [
                'status' => false,
                'message' => 'Only numbers supported',
                'data' => [],
            ];
        }

        if($height < 0 || $base < 0 || $side < 0){
            return [
                'status' => false,
                'message' => 'Negative numbers not supported for area of a circle',
                'data' => [],
            ];
        }
        return [
            'status' => true,
        ];
    }
}
