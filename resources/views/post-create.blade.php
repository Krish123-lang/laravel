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
