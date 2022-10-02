<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circle extends Model
{
    use HasFactory;
    // private $pie = 3.142;

    public static function SurfaceArea($radius)
    {
        $pie = 3.142;
        $result = $pie * sqrt($radius);
        return $result;
    }

    public static function Circumference($radius)
    {
        $pie = 3.142;
        $result = 2 * $pie * $radius;
        return $result;
    }
}
