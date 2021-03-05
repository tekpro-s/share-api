<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function post(Request $request)
    {
        //認証false
        return response()->json(['auth' => false], 200);
    }
}
