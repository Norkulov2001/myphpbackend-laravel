<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        return view('test');
    }

    public function phones(Request $request)
    {
        $otm = '';

        if($request->otm) {

            if($request->otm == 'tatu') {
                $otm = 'Toshkent Axbarot Texnalogiyalari Universiteti talabasi:';
            } else if ($request->otm == 'yodju') {
                $otm = 'Toshkent shahar YodJU universiteti';
            } else {
                $otm = 'Boshqa universitetda o\'qiydi';
            }

        }

        return view('phones', ['name' => $request->name, 'fio' => $request->lastname, 'university' => $otm, 'phones' => $request->phones]);
    }

    public function cars()
    {

        $cars = new Car();
        $cars->name = 'Lasetti';
        $cars->brand = 'Chevrolet';
        $cars->type = 'Yengil moshina';
        $cars->price = '$10000';
        $cars->save();

        echo 'Create';
    }
}
