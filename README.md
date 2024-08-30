1. ## Create Model(Post) - migration, controller, resource
`php artisan make:model Post -mcr // migration/controller,resource`
---

2. > Post.php
```
protected $fillable = [
        'title',
        'image',
        'body'
    ];
```
3. > views/post-create.blade.php
```
<h1>Create</h1>
```
4. > PostController.php
```
public function create()
{
    return view('post-create');
}
```
5. > web.php
```
Route::resource('post', PostController::class);
```
---
6. > post-create.blade.php
```
<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="">Title</label>
    <input type="text" name="title" placeholder="title">

    <label for="">Description</label>
    <textarea name="body" id="" cols="30" rows="10" placeholder="Description"></textarea>

    <label for="">Image</label>
    <input type="file" name="image">

    <input type="submit" value="Create">
</form>
```
---

7. > post-create.blade.php
```
<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="">Title</label>
    <input type="text" name="title" placeholder="title">
    @error('title')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    <br><br>

    <label for="">Description</label>
    <textarea name="body" id="" cols="30" rows="10" placeholder="Description"></textarea>
    @error('body')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    <br><br>

    <label for="">Image</label>
    <input type="file" name="image">
    @error('image')
        <span style="color: red;">{{ $message }}</span>
    @enderror

    {{-- error will not be shown for image if it is defined nullable in the migration --}}
    <br><br>

    <input type="submit" value="Create">
</form>
```
8. > migration/create_posts_table.php
`$table->string('image');`

9. > PostController.php
```
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:200|string',
        'body' => 'required|max:2000',
        // 'image' => 'nullable|mimes:png,jpg,jpeg,webp'
        'image' => 'required|mimes:png,jpg,jpeg,webp|max:2048'
    ]);
}
```
---
10. >post-create.blade.php
```
// Retail old data even after validation error
<input type="text" name="title" placeholder="title" value="{{ old('title') }}">
<textarea name="body" id="" cols="30" rows="10" placeholder="Description">{{ old('body') }}</textarea>

// for security reasons, laravel don't allows us to retain file 
```
---
