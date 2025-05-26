@extends('backend.layouts.main')

@section('content')

<div class="p-4 bg-white">
    <h4>Edit Post</h4>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('backend.pages.post.form', ['post' => $post])
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>

@endsection
