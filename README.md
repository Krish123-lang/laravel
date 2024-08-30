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

