<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Token;

class TokenController extends Controller
{
    public function getToken(Request $request) {     
        if($request->uuid !== NULL || (!empty($request->uuid))) {
            $token = str_random(16);
            $user = Token::create([
                'uuid'  => $request->uuid,
                'token' => $token,
            ]);
            $arr = array(
                'data'  => $user,
                'error' => false,
            );
            return response()->json($arr, 201);
        } else {
            $arr = array(
                'error'         => true,
                'error_message' => "NO_INPUT",
            );
            return response()->json($arr, 400);           
        }
        // 
    }
}
