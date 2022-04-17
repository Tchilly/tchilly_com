<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;

class ShowPostCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Category $category
     * @return Response
     */
    public function __invoke(Category $category): Response
    {
        $posts = Post::where('category_id', $category->id)->orderByDesc('created_at')->get();
        $categories = Category::all();
        return Inertia::render('Posts', compact(['posts', 'categories', 'category']));
    }
}
