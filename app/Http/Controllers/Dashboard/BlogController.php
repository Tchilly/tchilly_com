<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Inertia\Inertia;

class BlogController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Blog::class, 'blog');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(): \Inertia\Response
    {
        $blogs = Blog::with('category')->orderByDesc('updated_at')->get();

        return Inertia::render('Dashboard/Blogs/Index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create(): \Inertia\Response
    {
        $categories = Category::all();
        return Inertia::render('Dashboard/Blogs/Create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBlogRequest $request
     * @return RedirectResponse
     */
    public function store(StoreBlogRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Blog::create($validated);

        session()->flash('flash.banner', 'Blog post saved!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('dashboard.blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Blog $blog
     * @return Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Blog $blog
     * @return \Inertia\Response
     */
    public function edit(Blog $blog): \Inertia\Response
    {
        $categories = Category::all();
        return Inertia::render('Dashboard/Blogs/Edit', compact(['blog', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBlogRequest $request
     * @param Blog $blog
     * @return RedirectResponse
     */
    public function update(UpdateBlogRequest $request, Blog $blog): RedirectResponse
    {
        $validated = $request->validated();

        $blog->update($validated);

        session()->flash('flash.banner', 'Blog post updated!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('dashboard.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Blog $blog
     * @return RedirectResponse
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        $blog->delete();

        session()->flash('flash.banner', 'Blog post deleted!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('dashboard.blogs.index');
    }
}
