<?php

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;

public function index() {
    return PostResource::collection(Post::with('user')->paginate(10));  // Paginate
}

public function store(StorePostRequest $request) {
    $post = Post::create([
        'user_id' => auth()->id(),
        'title' => $request->title,
        'content' => $request->content,
    ]);
    return new PostResource($post);
}

public function show(Post $post) {
    return new PostResource($post->load('user'));
}

public function update(UpdatePostRequest $request, Post $post) {
    $post->update($request->only('title', 'content'));
    return new PostResource($post);
}

public function destroy(Post $post) {
    $post->delete();
    return response()->json(['message' => 'Post deleted successfully']);
}
