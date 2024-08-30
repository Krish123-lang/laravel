@if (session()->has('success'))
    {{ session()->get('success') }}
@endif

<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="">Title</label>
    <input type="text" name="title" placeholder="title" value="{{ old('title') }}">
    @error('title')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    <br><br>

    <label for="">Description</label>
    <textarea name="body" id="" cols="30" rows="10" placeholder="Description">{{ old('body') }}</textarea>
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


<table border="1px solid">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                {{-- <td>{{ $post->image }}</td> --}}

                <td><img src="{{ asset('uploads/images/' . $post->image) }}" width="70px" alt=""></td>
                <td><a href="#">Edit</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
