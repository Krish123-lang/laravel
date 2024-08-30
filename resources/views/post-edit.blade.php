<h4>Edit: {{ $post->title }}</h4>


<form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="">Title</label>
    <input type="text" name="title" placeholder="title" value="{{ $post->title }}">
    @error('title')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    <br><br>

    <label for="">Description</label>
    <textarea name="body" id="" cols="30" rows="10" placeholder="Description">{{ $post->title }}</textarea>
    @error('body')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    <br><br>

    <label for="">Image</label>
    <input type="file" name="image">
    <img src="{{ asset('uploads/images/' . $post->image) }}" width="500px" alt="">
    @error('image')
        <span style="color: red;">{{ $message }}</span>
    @enderror

    <br><br>

    <input type="submit" value="Update">
</form>
