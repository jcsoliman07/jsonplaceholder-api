<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    public function index(): JsonResponse
    {
        $todos = Todo::all();

        return response()->json(
            [
                'status'    =>  'success',
                'data'      =>  $todos
            ]);
    }

    public function show(int $id): JsonResponse
    {
        $todo = Todo::find($id);

        if (!$todo) 
        {
            return response()->json(
                [
                    'status'    =>  'error',
                    'message'   =>  'Todo not found'
                ], 404);
        }

        return response()->json(
            [
                'status'    =>  'success',
                'data'      =>  $todo
            ]);
    }
}
