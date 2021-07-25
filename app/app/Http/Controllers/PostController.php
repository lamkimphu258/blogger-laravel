<?php

namespace App\Http\Controllers;

use App\Enums\VoteEnum;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $posts = Post::with('author')->orderBy('published_at', 'desc')->paginate(10);

        return view('posts/list', ['posts' => $posts]);
    }

    public function indexByAuthor(): Factory|View|Application
    {
        $currentUserId = Auth::user()->id;
        $postsByAuthor = Post::where('author_id', $currentUserId)
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('posts/list-by-author', ['posts' => $postsByAuthor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $storePostRequest
     * @return RedirectResponse
     */
    public function store(StorePostRequest $storePostRequest): RedirectResponse
    {
        $currentUser = Auth::user();
        $input = $storePostRequest->only(['title', 'content', 'category_id']);
        $input['author_id'] = $currentUser->id;
        $input['slug'] = Str::slug($input['title']);
        Post::create($input);

        return back()->with('success', 'Your new post is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post): \Illuminate\View\View
    {
        return view('posts/show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function edit(Post $post): View|Factory|Application
    {
        return view('posts/edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $updatePostRequest
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(UpdatePostRequest $updatePostRequest, Post $post)
    {
        $currentUser = Auth::user();
        $input = $updatePostRequest->only(['title', 'content']);
        $input['author_id'] = $currentUser->id;
        $input['slug'] = Str::slug($input['title']);
        $post->update($input);

        return redirect(route('post-list-by-author'))->with('success', 'Your post is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        Post::where('id', $id)->delete();

        return back()->with('success', 'Delete your post successfully');
    }

    /**
     * @param Post $post
     * @param string $vote
     * @return RedirectResponse
     */
    public function vote(Post $post, string $vote)
    {
        try {
            $this->authorize('vote', $post);
        } catch (AuthorizationException $e) {
            return back()->withErrors('You can not vote your post');
        }
        if ($vote === VoteEnum::LIKE) {
            $post->like++;
            $post->save();
        } elseif ($vote === VoteEnum::DISLIKE) {
            $post->dislike--;
            $post->save();
        }

        return redirect()->route('post-show', ['post' => $post]);
    }
}
