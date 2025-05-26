@extends('backend.layouts.main')

@section('content')

<div class="p-4 bg-white">
    <h4>Add New Post</h4>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('backend.pages.post.form', ['post' => null])
        <button type="submit" class="btn btn-success">Create Post</button>
    </form>
</div>

@endsection
