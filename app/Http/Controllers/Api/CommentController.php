<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function index(): JsonResponse
    {
        $comments = Comment::all();

        return response()->json(
            [  
                'status'    => 'success',
                'data'      => $comments,
            ]);
    }

    public function show (int $id): JsonResponse
    {
        $comment = Comment::find($id);

        if  (!$comment)
        {
            return response()->json(
            [  
                'status'    => 'error',
                'data'      => $comment,
            ]);
        }

        return response()->json(
            [
                'status'    =>  'success',
                'data'      =>  $comment,
            ]);
    }

    public function indexByPost(int $postId): JsonResponse
    {
        $comments = Comment::where('post_id', $postId)->get();

        return response()->json(
            [
                'status'    =>  'success',
                'data'      =>  $comments,
            ]);
    }
}
