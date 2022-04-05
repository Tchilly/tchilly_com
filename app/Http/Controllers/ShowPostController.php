<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
            $posts = Post::where('category_id', $post->category_id)->limit(3)->get();
            return Inertia::render('Templates/Post', compact(['post', 'posts']));
        }

        $posts = Post::orderByDesc('created_at')->get();
        return Inertia::render('Posts', compact('posts'));
    }
}
