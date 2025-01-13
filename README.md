# CRUD APP LARAVEL
1. > `php artisan make:model Post -m`
---
2. > `models/Post.php`
    ```
    protected $fillable = [
        'title',
        'body',
        'image'
    ];
    ```
---
4. > `create_posts_table.php`
    ```
     // $table->id();
        $table->increments('id');
        $table->string('title');
        $table->text('body');
        $table->string('image');
        $table->timestamps();
    ```
---
3. > `PostController.php`
    ```
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::paginate(5);
        return view('index', compact('posts'));
    }

    public function create()
    {
        return view('create');
    }

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

    public function show(Post $post)
    {
        return view('show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('edit', compact('post'));
    }

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
    ```
---
4. > `routes/web.php`
    ```
    Route::view("/", 'home');
    Route::resource('posts', PostController::class);
    ```
---
5. > `layouts/app.blade.php`
    ```
    <title>
        @yield('title')
    </title>

    <div class="container m-5">
        <a href="/" class="btn btn-primary mb-3">Home</a>
        @yield('content')
    </div>
    ```
---
6. > `create.blade.php`, `edit.blade.php`, `index.blade.php`, `show.blade.php`
---
7. > `create.blade.php`
    ```
    @extends('layout.app')

    @section('title')
        Create
    @endsection

    @section('content')
        <a href="{{ route('posts.index') }}" class="btn btn-dark float-end mb-3">Back to Posts</a>
        <h1>Create Post</h1>

        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{ old('title') }}">
                @error('title')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" rows="3" name="body"> {{ old('body') }}</textarea>
                @error('body')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input class="form-control" type="file" name="image">
                @error('image')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
    @endsection
    ```
---
7. > `index.blade.php`
    ```
    @extends('layout.app')

    @section('title')
        Home
    @endsection

     <a href="{{ route('posts.create') }}" class="btn btn-dark float-end">Create Post</a>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <tbody>
            @if ($posts->isEmpty())
                <tr>
                    <td colspan="6" class="text-center fs-4">No posts found !</td>
                </tr>
            @else
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><a {{-- href="{{ route('posts.show', $post->id) }}">{{ \Illuminate\Support\Str::words($post->title, 5, '...') }}</a> --}}
                                href="{{ route('posts.show', $post->id) }}">{{ \Illuminate\Support\Str::limit($post->title, 15, '...') }}</a>
                        </td>
                        {{-- <td>{{ \Illuminate\Support\Str::words($post->body, 5, '...') }}</td> --}}
                        <td>{{ \Illuminate\Support\Str::limit($post->body, 15, '...') }}</td>


                        <td><img src="{{ asset('uploads/images/' . $post->image) }}" width="70px" alt=""></td>

                        <td>{{ $post->updated_at }}</td>
                        <td><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a></td>
                        <td>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post"
                                enctype="multipart/form-data"
                                onsubmit="return confirm('Are you sure you want to delete the post {{ $post->title }}?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $posts->links() !!}
    </div>
    ```
---
8. > `show.blade.php`
    ```
    @extends('layout.app')
    @section('title')
        {{ $post->title }}
    @endsection

    @section('content')
        <a href="{{ route('posts.index') }}" class="btn btn-dark float-end mb-3">Back to Posts</a>
        <h1 class="text-decoration-underline my-3">Title</h1>
        <h1>{{ $post->title }}</h1>
        <hr>
        <h1 class="text-decoration-underline my-3">Description</h1>
        <p>{{ $post->body }}</p>
        <hr>
        <p>Created at: {{ $post->created_at }}</p>
        <p>Updated at: {{ $post->updated_at }}</p>
        <hr>
        <img src="{{ asset('uploads/images/' . $post->image) }}" class="rounded" width="500px" alt="">
    @endsection
    ```
---
9. > `edit.blade.php`
    ```
    @extends('layout.app')
    @section('title')
        Edit
    @endsection

    @section('content')
        <a href="{{ route('posts.index') }}" class="btn btn-dark float-end mb-3">Back to Posts</a>

        <h1>Edit: {{ $post->title }}</h1>


        <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{ $post->title }}">
                @error('title')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" rows="3" name="body"> {{ $post->title }}</textarea>
                @error('body')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input class="form-control" type="file" name="image">

                <img src="{{ asset('uploads/images/' . $post->image) }}" class="mt-3 rounded" width="500px" alt="">
                @error('image')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    @endsection
    ```
---
