<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Category|null $category
     * @return Response
     */
    public function index(Category $category = null): Response
    {

        $categories = Category::all();
        $posts = Post::orderByDesc('created_at');

        if ($category) {
            $posts = $posts->where('category_id', $category?->id);
        }

        $posts = $posts->cursorPaginate(24);

        return Inertia::render('Posts', compact(['posts', 'category', 'categories']));
    }


    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @param Post $post
     * @return Response
     */
    public function show(Category $category, Post $post): Response
    {
        $post->body = $post->body ? Str::markdown($post->body) : "";
        $posts = Post::where('category_id', $category->id)->limit(3)->get();

        return Inertia::render('Templates/Post', compact(['post', 'posts']));
    }
}
