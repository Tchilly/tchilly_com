<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SearchPageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Collection
     */
    public function __invoke(Request $request)
    {
        return Post::search($request->input('query'))->take(25)->get();
    }
}
