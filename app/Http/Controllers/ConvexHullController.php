<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvexHullController extends Controller
{
    //
    public function index(){

        $points = [];
        $num  = 0;
        $max_x = 50;
        $max_y = 30;
        $radius = 5;
        $point_num = 10;

        while($num < $point_num)
        {
            $x = rand(0,$max_x);
            $y = rand(0,$max_y);

            $point = ['x' => $x, 'y' => $y];
            if (!in_array($point, $points))
            {
                $points[] = $point;
                $num++;
            }

        }

        $points = $this->sort_points($points);

        var_dump($points);
        return view('convex_hull.index', ['points' => $points,'max_x'=>$max_x,'max_y'=>$max_y,'radius'=>$radius]);
    }

    public function sort_points($points)
    {
        $points = collect($points)->sortBy('y');

        $min = $points->shift();
        var_dump($min);

        $points = $points->map(function($point) use($min){
            //對/斜
            $point['deg'] =rad2deg(asin( ($min['x'] - $point['x']) / sqrt(pow($min['x'] - $point['x'], 2) + pow($min['y'] - $point['y'], 2)) ));

            return $point;
        });


        return $points->prepend($min)->values();
    }

}
