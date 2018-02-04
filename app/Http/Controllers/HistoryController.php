<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        if($request->token !== NULL || (!empty($request->token))) {
            $token = DB::table('tokens')->select('id')->where('token', $request->token)->first();
            if (!empty($token)) {
                // $item = DB::table('histories')->select('token_id', 'email as user_email')->get();
                // dd($token->id);
                $item = DB::table('histories')->where('token_id', '=', $token->id)->latest()->get();
                $arr = array(
                    'data'  => $item,
                    'error' => false,
                );
                return response()->json($arr, 200);
            } else {
                $arr = array(
                    'error'         => true,
                    'error_message' => "NO_TOKEN",
                );
                return response()->json($arr, 400); 
            }
        } else {
            $arr = array(
                'error'         => true,
                'error_message' => "NO_TOKEN",
            );
            return response()->json($arr, 400); 
        }
    }

    public function store(Request $request)
    {
        if($request->token !== NULL || (!empty($request->token))) {
            $query = DB::table('tokens')->where('token', $request->token)->first();
            if (!empty($query)) {
                // dd(is_numeric($request->a_value));
                if( (($request->a_value !== NULL || (!empty($request->a_value))) && (is_numeric($request->a_value)) ) && 
                (($request->b_value !== NULL || (!empty($request->b_value))) && (is_numeric($request->b_value))) && 
                ($request->operator !== NULL || (!empty($request->operator))) ) {
                    $user = History::create([
                        'token_id'  =>  $query->id,
                        'a_value'   =>  $request->a_value,
                        'b_value'   =>  $request->b_value,
                        'operator'  =>  $request->operator,
                    ]);
                    $arr = array(
                        'data'  =>  $user,
                        'error' =>  false,
                    );
                    return response()->json($arr, 201);
                } else {
                    $arr = array(
                        'error'         => true,
                        'error_message' => "NO_INPUT",
                    );
                    return response()->json($arr, 400);                    
                }
            } else {
                $arr = array(
                    'error'         => true,
                    'error_message' => "NO_TOKEN",
                );
                return response()->json($arr, 400); 
            }
        } else {
            $arr = array(
                'error'         => true,
                'error_message' => "NO_INPUT",
            );
            return response()->json($arr, 400); 
        }


    }

    // public function update(Request $request, History $history)
    // {
    //     $history->update($request->all());

    //     return response()->json($history, 200);
    // }

    // public function delete(History $history)
    // {
    //     $history->delete();

    //     return response()->json(null, 204);
    // }
}
