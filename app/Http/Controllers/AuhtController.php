<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuhtController extends Controller
{
    public function login()
    {
        $credientials = request(['name', 'password']);

        if(!auth()->attempt($credientials)){
            return response()->json(['errors' => 'Xatolik'], 401);
        }

        $token = auth()->user()->createToken('authToken')->accessToken;

        return response()->json([

            'token' => $token,
            'user' => auth()->user()
        ]);
    }
}
