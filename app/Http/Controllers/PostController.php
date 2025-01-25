<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post.index');
    }

    public function fetchPost()
    {
        $posts = Post::with('authorName')->where('status', 1)->get();

        // Return posts as JSON
        return response()->json(['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'image' => 'nullable|max:2048',
        ]);
        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }
        Post::create([
            'name' => $request->input('name'),
            'date' => now()->toDateString(),
            'author' => Auth::id(),
            'content' => $request->input('content'),
            'blog_image' => $imagePath,
            'status' => 1,
        ]);
        return response()->json(['message' => 'Record created successfully.'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $selectedPost = Post::with('authorName')->find($id);
        return response()->json(['data' => $selectedPost], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $selectedPost = Post::with('authorName')->find($id);
        return response()->json(['data' => $selectedPost], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'image' => 'nullable|max:2048',
        ]);
        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }
        $edittedPost = Post::find($request->input('editId'));
        $edittedPost->update([
            'name' => $request->input('name'),
            'date' => now()->toDateString(),
            'author' => Auth::id(),
            'content' => $request->input('content'),
            'blog_image' => $imagePath ?? $edittedPost->image,
            'status' => 1,
        ]);
        return response()->json(['message' => 'Record updated successfully.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($id) {
            $deletePost = Post::find($id);
            $deletePost->status = 0;
            $deletePost->save();
            return response()->json(['message' => 'Blog post deleted successfully!!.'], 200);
        } else {
            return response()->json(['message' => 'Record id not found.'], 404);
        }
    }
}
