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
