<?php

 namespace App\Services;

 use App\Models\Triangle;

 class TriangleCalService implements GeometryContract
 {


    public function sumAreasOfShapes ($shape1, $shape2){

        $triangle  = new Triangle();
        $areaOfObj1 = $triangle::SurfaceArea($shape1['height'],$shape1['base']);
        $areaOfObj2 = $triangle::SurfaceArea($shape2['height'],$shape1['base']);
        $sum = $areaOfObj1 + $areaOfObj2;

        return round($sum,2);
    }

    public function sumCircumferenceOfShapes ($shape1, $shape2){

        $triangle  = new Triangle();
        $res1 = $triangle::Circumference($shape1['height'],$shape1['base'],$shape2['side']);
        $res2 = $triangle::Circumference($shape2['height'],$shape2['base'],$shape1['side']);
        $sum = $res1 + $res2;

        return round($sum,2);

    }
 }
