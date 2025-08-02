<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index(): JsonResponse
    {
        //Fetch all Users with address and company
        $users = User::with(['address', 'company'])->get();

        return response()->json($users);
    }

    public function show(int $id): JsonResponse
    {
        //Fetch specific user by Id
        $user = User::with(['address', 'company'])->find($id);

        if (!$user) {
            return response()->json(
                [
                    'status'    => 'error',
                    'message'   => 'User not found'
                ], 404);
        }

        return response()->json(
            [
                'status'    => 'success',
                'data'      => $user,
            ]);
    }

}
