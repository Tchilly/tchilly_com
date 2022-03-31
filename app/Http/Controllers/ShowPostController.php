<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class ShowPostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Post|null $post
     * @return Response
     */
    public function __invoke(Post $post = null): Response
    {
        if ($post) {
            $post->load(['category', 'user']);
            $post->body = Str::markdown($post->body);
            return Inertia::render('Templates/Post', compact('post'));
        }

        $posts = Post::with(['category', 'user'])->get();
        return Inertia::render('Posts', compact('posts'));
    }
}
