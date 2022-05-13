<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class ShowPageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Page $page
     * @return Response
     */
    public function __invoke(Page $page): Response
    {
        $page->body = Str::markdown($page->body);
        return Inertia::render('Templates/' . $page->template, compact('page'));
    }
}
