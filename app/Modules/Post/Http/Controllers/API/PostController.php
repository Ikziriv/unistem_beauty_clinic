<?php

namespace App\Modules\Post\Http\Controllers\API;

use Illuminate\Http\Request;
use App\ {
    Http\Resources\Post\PostCollection,
    Http\Resources\Post\PostResource,
    Http\Controllers\Controller,
    Modules\Post\Post
};

class PostController extends Controller
{
	// 
	public function index()
	{
        return PostCollection::collection(Post::all());
	}
    // 
    public function show(Post $post)
    {
        return new PostResource($post);
    }
}
