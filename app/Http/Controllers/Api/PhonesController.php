<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhonesController extends Controller
{
    public function index()
    {
        $phones = Phone::get();

        return response()->json($phones);
    }
}
