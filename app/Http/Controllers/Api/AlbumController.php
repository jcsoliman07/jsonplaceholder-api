<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    
    public function index(): JsonResponse
    {
        //Fetch All Album Data
        $albums = Album::with('photos')->get();

        return response()->json(
            [
                'status'    =>  'success',
                'data'      =>  $albums
            ]);
    }

    public function show(int $id): JsonResponse
    {
        //Fetch Specific Album
        $album = Album::with('photos')->find($id);

        if (!$album) 
        {
            return response()->json(
                [
                    'status'    => 'error',
                    'message'   => 'Album not found'
                ], 404);
        }

        return response()->json(
            [
                'status'    =>  'success',
                'data'      =>  $album
            ]);
    }
}
