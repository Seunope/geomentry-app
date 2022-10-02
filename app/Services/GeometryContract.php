<?php

namespace App\Services;

interface GeometryContract {

    public function sumAreasOfShapes($radius1, $radius2);
    public function sumCircumferenceOfShapes ($radius1, $radius2);
}
