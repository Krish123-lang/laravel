<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::paginate(5);
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'body' => 'required|max:2000',
            'image' => 'required|mimes:png,jpg,jpeg,webp|max:2048'
        ]);

        if ($request->has('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/images/'), $imageName);
            $data['image'] = $imageName;
        }

        Post::create($data);
        // return back()->with('success', 'Post created successfully !');
        return to_route('posts.index')->with('success', 'Post created successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'sometimes|string|max:200',
            'body' => 'sometimes|max:2000',
            'image' => 'sometimes|mimes:png,jpg,jpeg,webp|max:2048'
        ]);

        if ($request->has('image')) {
            // Checks old image
            $destination = 'uploads/images/' . $post->image;


            // Removes old image
            if (File::exists($destination)) {
                File::delete($destination);
            }

            // add new image
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();

            // move the image to the server
            $request->image->move(public_path('uploads/images/'), $imageName);

            // update image name on server
            $data['image'] = $imageName;
        }

        $post->update($data);
        return to_route('posts.index')->with('success', 'Post has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            $destination = 'uploads/images/' . $post->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }
        $post->delete($post);
        return to_route('posts.index')->with('success', "Post Deleted Successfully !");
    }
}
