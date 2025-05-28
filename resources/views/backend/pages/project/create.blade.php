@extends('backend.layouts.main')

@section('content')

<div class="container">
    <div class="p-3 mb-3 text-center text-white font-weight-bolder" style="background-color: #4e73df">
        Add New Project
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="project_category_id" class="text-primary font-weight-bold">Project Category</label>
                    <select name="project_category_id" id="project_category_id" class="form-control">
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('project_category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('project_category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Project Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="description">Project Description</label>
                    <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="client">Client <span class="text-danger">*</span></label>
                    <input type="text" name="client" value="{{ old('client') }}" class="form-control" required>
                    @error('client') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="publish_date">Publish Date</label>
                    <input type="date" name="publish_date" value="{{ old('publish_date') }}" class="form-control">
                    @error('publish_date') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="url">Project URL</label>
                    <input type="url" name="url" value="{{ old('url') }}" class="form-control">
                    @error('url') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="images">Project Images (You can select multiple)</label>
                    <input type="file" name="images[]" class="form-control" multiple>
                    @error('images') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mt-4">
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Create Project</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
