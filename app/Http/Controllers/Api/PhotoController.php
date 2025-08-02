<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    use ApiResponse;

    public function index(): JsonResponse
    {
        //Fetch All Photo
        $photos = Photo::with('album')->get();

        return $this->successResponse($photos);
    }

    public function show($id): JsonResponse
    {
        //Specific Photo By ID
        $photo = Photo::with('album')->find($id);

        if (!$photo) 
        {
            return $this->errorResponse('Photo not found', 404);
        }

        return $this->successResponse($photo);
    }

    public function indexByAlbum($albumId): JsonResponse
    {
        $photos = Photo::where('album_id', $albumId)->get();

        return $this->successResponse($photos);
    }
}