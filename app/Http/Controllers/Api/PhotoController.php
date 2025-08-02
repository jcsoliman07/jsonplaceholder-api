<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index(): JsonResponse
    {
        //Fetch All Photo
        $photos = Photo::with('album')->get();

        return response()->json(
            [
                'status'    =>  'success',
                'data'      >   $photos
            ]);
    }

    public function show($id): JsonResponse
    {
        //Specific Photo By ID
        $photo = Photo::with('album')->find($id);

        if (!$photo) 
        {
            return response()->json(
                [
                    'status'    =>  'error',
                    'message'   =>  'Photo not found'
                ], 404);
        }

        return response()->json(
            [
                'status'    =>  'success',
                'data'      =>  $photo
            ]);
    }

    public function indexByAlbum($albumId): JsonResponse
    {
        $photos = Photo::where('album_id', $albumId)->get();

        return response()->json(
            [
                'status'    =>  'success',
                'data'      =>  $photos
            ]);
    }
}
