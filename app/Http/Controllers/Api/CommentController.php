<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    use ApiResponse;

    public function index(): JsonResponse
    {
        $comments = Comment::all();

        return $this->successResponse($comments);
    }

    public function show (int $id): JsonResponse
    {
        $comment = Comment::find($id);

        if  (!$comment)
        {
            return $this->errorResponse('Comment not found', 404);
        }

        return $this->successResponse($comment);
    }

    public function indexByPost(int $postId): JsonResponse
    {
        $comments = Comment::where('post_id', $postId)->get();

        return $this->successResponse($comments);
    }
}
