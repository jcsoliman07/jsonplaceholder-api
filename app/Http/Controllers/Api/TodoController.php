<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    use ApiResponse;


    public function index(): JsonResponse
    {
        $todos = Todo::all();

        return $this->successResponse($todos);
    }

    public function show(int $id): JsonResponse
    {
        $todo = Todo::find($id);

        if (!$todo) 
        {
            return $this->errorResponse('Todo not found', 404);
        }

        return $this->successResponse($todo);
    }
}
