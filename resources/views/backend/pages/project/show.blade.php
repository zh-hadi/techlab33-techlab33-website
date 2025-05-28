@extends('backend.layouts.main')

@section('content')

<div class="container">
    <div class="p-3 mb-4 text-center text-white font-weight-bold" style="background-color: #4e73df;">
        Project Details
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="mb-3">
                <strong class="text-primary">Project Category Name:</strong>
                <p>{{ $project->category->name }}</p>
            </div>

            <div class="mb-3">
                <strong class="text-primary">Project Name:</strong>
                <p>{{ $project->name }}</p>
            </div>

            <div class="mb-3">
                <strong class="text-primary">Client:</strong>
                <p>{{ $project->client }}</p>
            </div>

            <div class="mb-3">
                <strong class="text-primary">Publish Date:</strong>
                <p>{{ $project->publish_date ? \Carbon\Carbon::parse($project->publish_date)->format('F d, Y') : 'N/A' }}</p>
            </div>

            <div class="mb-3">
                <strong class="text-primary">URL:</strong>
                <p>
                    @if($project->url)
                        <a href="{{ $project->url }}" target="_blank">{{ $project->url }}</a>
                    @else
                        N/A
                    @endif
                </p>
            </div>

            <div class="mb-3">
                <strong class="text-primary">Description:</strong>
                <p>{{ $project->description ?? 'N/A' }}</p>
            </div>

            <div class="mb-3">
                <strong class="text-primary">Project Images:</strong>
                <div class="row">
                    @forelse($project->images as $image)
                        <div class="col-md-3 mb-2">
                            <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid rounded shadow" alt="Project Image">
                        </div>
                    @empty
                        <p>No images uploaded.</p>
                    @endforelse
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('projects.index') }}" class="btn btn-primary">Back to Projects</a>
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit Project</a>
            </div>

        </div>
    </div>
</div>

@endsection
