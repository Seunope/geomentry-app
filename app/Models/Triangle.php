<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Triangle extends Model
{
    use HasFactory;


    public static function SurfaceArea($height, $base)
    {
        /// 1/2(b*h)
        $result = $height * $base / 2;
        return $result;
    }

    public static function Circumference($height, $base, $side)
    {
        //perimeter
        $result = $height + $base +  $side;
        return $result;
    }
}
