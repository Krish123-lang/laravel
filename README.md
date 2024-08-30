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
