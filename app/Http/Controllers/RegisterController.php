<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

// 新規会員登録
class RegisterController extends Controller
{
    public function post(Request $request)
    {
        //POSTリクエストされた値を登録
        $now = Carbon::now();
        $hased_password = Hash::make($request->password);
        $param = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $hased_password,
            "profile" => $request->profile,
            "created_at" => $now,
            "updated_at" => $now,
        ];
        DB::table('users')->insert($param);
        return response()->json([
            'message' => 'User created successfully',
            'data' => $param
        ], 200);
    }
}
