<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function about (Request $request): \Inertia\Response
    {
        return Inertia::render('About');
    }
    public function support (Request $request): \Inertia\Response
    {
        return Inertia::render('Welcome');
    }
}
