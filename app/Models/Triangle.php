<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Triangle extends Model
{
    use HasFactory;


    public static function SurfaceArea($input)
    {
        /// 1/2(b*h)
        $result = $input->height * $input->base / 2;
        return $result;
    }

    public static function Circumference($input)
    {
        //perimeter
        $result = $input->height + $input->base +  $input->side;
        return $result;
    }
}
