<?php

namespace App\Services;

 use App\Models\Circle;

 class CircleCalService implements GeometryContract
 {

    public function sumAreasOfShapes ($radius1, $radius2){

        $circle  = new Circle();
        $areaOfObj1 = $circle::SurfaceArea($radius1);
        $areaOfObj2 = $circle::SurfaceArea($radius2);
        $sum = $areaOfObj1 + $areaOfObj2;

        return round($sum,2);
    }

    public function sumCircumferenceOfShapes ($radius1, $radius2){

        $circle  = new Circle();
        $res1 = $circle::Circumference($radius1);
        $res2 = $circle::Circumference($radius2);
        $sum = $res1 + $res2;

        return round($sum,2);

    }
 }
