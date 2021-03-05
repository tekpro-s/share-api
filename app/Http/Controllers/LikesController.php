<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LikesController extends Controller
{
    // シェアにいいねを付ける
    public function post(Request $request)
    {
        // likesテーブルにシェアID、ユーザIDを登録する
        $now = Carbon::now();
        $param = [
            "share_id" => $request->share_id,
            "user_id" => $request->user_id,
            "created_at" => $now,
            "updated_at" => $now
        ];
        DB::table('likes')->insert($param);
        return response()->json([
            'message' => 'Like created successfully',
            'data' => $param
        ], 200);
    }
    public function delete(Request $request)
    {
        DB::table('likes')->where('share_id', $request->share_id)->where('user_id', $request->user_id)->delete();
        return response()->json([
            'message' => 'Like deleted successfully',
        ], 200);
    }
}
