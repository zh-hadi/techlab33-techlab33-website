@extends('backend.layouts.main')

@section('content')

<div>
    <div class="p-2 text-center font-weight-bolder" style="background-color: #4e73df">
        <div class="text-white">Project Manage</div>
    </div>

    <div class="p-4 bg-white">
        <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Add New Project</a>

        <div class="table-responsive">
            <table class="table table-bordered" id="project_dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Client</th>
                        <th>Publish Date</th>
                        <th>URL</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $key => $project)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->client }}</td>
                        <td>{{ $project->publish_date ?? 'N/A' }}</td>
                        <td>
                            @if($project->url)
                                <a href="{{ $project->url }}" target="_blank">{{ Str::limit($project->url, 30) }}</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $project->category->name }}</td>
                        <td>
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-sm btn-secondary">View</a>
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
