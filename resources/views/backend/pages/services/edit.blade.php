@extends('backend.layouts.main')

@section('content')
<div class="p-4 bg-white">
    <h4>Edit Service Category</h4>

    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-md-12">
                <label for="name">Service Category Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $service->name) }}" required>
                @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-12">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3">{{ old('description', $service->description) }}</textarea>
                @error('description')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-12">
                <label for="content">Content</label>
                <textarea class="form-control ckeditor @error('content') is-invalid @enderror" name="content" rows="5">{{ old('content', $service->content) }}</textarea>
                @error('content')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="icon">Icon Class</label>
                <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ old('icon', $service->icon) }}">
                <small class="text-muted">Example: bi bi-activity</small>
                @error('icon')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="image">Image (Optional)</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                @error('image')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror

                @if($service->image)
                    <img src="{{ asset('uploads/services/' . $service->image) }}" class="img-thumbnail mt-2" style="max-height: 150px;">
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary mt-3">Back</a>
    </form>
</div>
@endsection
