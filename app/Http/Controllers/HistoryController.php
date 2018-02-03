<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::all();
        if (!$histories) {
            throw new HttpException(400, "Invalid data");
        }
        return response()->json(
            $histories,
            200
        );
    }

    public function lastest()
    {
        $query = DB::table('histories')->orderBy('created_at', 'desc')->first();
        if (!$query) {
            throw new HttpException(400, "Invalid data");
        }
        return response()->json(
            $query,
            200
        );
    }

    public function store(Request $request)
    {
        $history = History::create($request->all());

        return response()->json($history, 201);

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
