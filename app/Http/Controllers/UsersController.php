<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    // ユーザー情報を取得する
    public function get(Request $request)
    {
        // emailがあればユーザー情報取得
        if ($request->has('email')) {
            $items = DB::table('users')->where('email', $request->email)->get();
            return response()->json([
                'message' => 'User got successfully',
                'data' => $items
            ], 200);
        } else {
            return response()->json(['status' => 'not found'], 404);
        }
    }

    // emailが一致するユーザー情報を更新する
    public function put(Request $request)
    {
        $param = [
            'profile' => $request->profile,
            'email' => $request->email
        ];
        DB::table('users')->where('email', $request->email)->update($param);
        return response()->json([
            'message' => 'User updated successfully',
            'data' => $param
        ], 200);
    }
}
