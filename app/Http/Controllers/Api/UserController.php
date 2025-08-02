<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponse;

    public function index(): JsonResponse
    {
        //Fetch all Users with address and company
        $users = User::with(['address', 'company'])->get();

        return $this->successResponse($users);
    }

    public function show(int $id): JsonResponse
    {
        //Fetch specific user by Id
        $user = User::with(['address', 'company'])->find($id);

        if (!$user) {
            return $this->errorResponse('User not found', 404);
        }

        return $this->successResponse($user);
    }

}
