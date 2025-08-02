<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    use ApiResponse;
    
    public function index(): JsonResponse
    {
        //Fetch All Album Data
        $albums = Album::with('photos')->get();

        return $this->successResponse($albums);
    }

    public function show(int $id): JsonResponse
    {
        //Fetch Specific Album
        $album = Album::with('photos')->find($id);

        if (!$album) 
        {
            return $this->errorResponse('Album not found', 404);
        }

        return $this->successResponse($album);
    }
}
