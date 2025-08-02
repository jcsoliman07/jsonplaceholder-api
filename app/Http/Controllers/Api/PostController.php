<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(): JsonResponse
    {
        //Fetch All Post
        $posts = Post::with('comments')->get();
        return response()->json($posts);
    }

    public function show(int $id): JsonResponse
    {
        //Fetch Specific Post By Id
        $post = Post::with('comments')->find($id);

        if (!$post) {
            return response()->json(
                [
                    'status'    => 'error',
                    'message'   => 'Post not found'
                ], 404);
        }

        return response()->json(
            [
                'status'    =>  'success',
                'data'      => $post
            ]);
    }
}
