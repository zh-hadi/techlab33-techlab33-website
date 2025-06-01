@extends('backend.layouts.main')

@section('content')

<div>
    <div class="p-2 text-center font-weight-bolder" style="background-color: #4e73df">
        <div class="text-white">Service  Manage</div>
    </div>

    <div class="p-4 bg-white">
        <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Add New Service </a>

        <div class="table-responsive">
            <table class="table table-bordered" id="service_category_dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th style="width: 180px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $key => $service)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $service->name }}</td>
                        <td>
                            @if($service->status)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('services.show', $service->id) }}" class="btn btn-sm btn-info">Show</a>
                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
