<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\SubmitContactFormRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\MediaLibrary\MediaCollections\Exceptions\MediaCannotBeDeleted;

class PostController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $posts = Post::with('category')->orderByDesc('created_at')->get();

        return Inertia::render('Dashboard/Posts/Index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        $categories = Category::all();
        return Inertia::render('Dashboard/Posts/CreateEdit', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return RedirectResponse
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated = [
            'user_id' => request()->user()->id,
            ...$validated
        ];

        $post = Post::create($validated);

        if (!empty($validated['photo'])) {
            $post->updatePhoto($validated['photo']);
        }

        session()->flash('flash.banner', 'Post saved successfully!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('dashboard.posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function edit(Post $post): Response
    {
        $categories = Category::all();
        return Inertia::render('Dashboard/Posts/CreateEdit', compact(['post', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $validated = $request->validated();

        if (!empty($validated['photo'])) {
            $post->updatePhoto($validated['photo']);
        }

        $post->update($validated);

        session()->flash('flash.banner', 'Post updated successfully!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('dashboard.posts.index');
    }

    /**
     * Delete associated photo
     * @throws MediaCannotBeDeleted
     */
    public function deletePhoto(Post $post): RedirectResponse
    {
        $post->deletePhoto();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        session()->flash('flash.banner', 'Post deleted successfully!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('dashboard.posts.index');
    }
}
