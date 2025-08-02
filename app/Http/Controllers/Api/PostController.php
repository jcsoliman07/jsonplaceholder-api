<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use ApiResponse;

    public function index(): JsonResponse
    {
        //Fetch All Post
        $posts = Post::with('comments')->get();

        return $this->successResponse($posts);
    }

    public function show(int $id): JsonResponse
    {
        //Fetch Specific Post By Id
        $post = Post::with('comments')->find($id);

        if (!$post) {
            return $this->errorResponse('Post not found', 404);
        }

        return $this->successResponse($post);
    }
}
