<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    protected function successResponse($data, int $code = 200): JsonResponse
    {
        return response()->json(
        [
            'status'    =>  'success',
            'data'      =>  $data,

        ], $code);
    }

    protected function errorResponse(string $message, int $code = 404): JsonResponse
    {
        return response()->json(
        [
            'status'    =>  'error',
            'message'   =>  $message,

        ], $code);
    }
}
