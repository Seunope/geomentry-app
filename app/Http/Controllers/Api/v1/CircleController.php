<?php
namespace App\Http\Controllers\Api\v1;

use App\Models\Circle;
use Illuminate\Http\Request;
use App\Services\GeometryContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\CircleRequest;

class CircleController extends Controller
{
    public function index(Request $request, $radius)
    {
        $isDataClean = $this->validInput($radius);
        if(!$isDataClean['status']){
            return response()->json($isDataClean, 400, [], JSON_PRETTY_PRINT);
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



    public function sumShapeCalculation(CircleRequest $request, GeometryContract $circleService,$radius1, $radius2)
    {
        $isDataClean = $this->validInput($radius1);
        if(!$isDataClean['status']){
            return response()->json($isDataClean, 400, [], JSON_PRETTY_PRINT);
        }

        $isDataClean = $this->validInput($radius2);
        if(!$isDataClean['status']){
            return response()->json($isDataClean, 400, [], JSON_PRETTY_PRINT);
        }

        if($request->get('shape') !== 'circle'){
            $disData['status'] = false;
            $disData['message'] = 'wrong shape type, expected circle ';
            $disData['data'] = [];
            return response()->json($disData, 400, [], JSON_PRETTY_PRINT);
        }

        $resArea = $circleService->sumAreasOfShapes($radius1, $radius2);
        $resCircumference = $circleService->sumCircumferenceOfShapes($radius1, $radius2);

        $data ['type'] = "circle";
        $data ['radius1'] = number_format($radius1, 1);
        $data ['radius2'] = number_format($radius2, 1);
        $data ['sum_surface'] = round($resArea, 2);
        $data ['sum_circumference'] = round($resCircumference, 2);
        $data['unit'] = $request['unit'];

        $finalData['status'] = true;
        $finalData['message'] = 'action was successful';
        $finalData['data'] = $data;

        return response()->json($finalData, 200, [], JSON_PRETTY_PRINT);
    }


    private function validInput ($radius){

        if(!is_numeric($radius)){
            return [
                'status' => false,
                'message' => 'Only numbers supported',
                'data' => [],
            ];
        }

        if($radius < 0){
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
