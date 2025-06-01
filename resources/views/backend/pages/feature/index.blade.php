@extends('backend.layouts.main')

@section('content')
<div class="p-2 text-center font-weight-bolder" style="background-color: #4e73df">
    <div class="text-white">Feature Manage</div>
</div>

<div class="p-4 bg-white">
    <a href="{{ route('features.create') }}" class="btn btn-success mb-3">Add Feature</a>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($features as $key => $feature)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $feature->title }}</td>
                        <td>{{ $feature->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            @if($feature->image)
                                <img src="{{ asset('storage/' . $feature->image) }}" width="80">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('features.edit', $feature->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('features.destroy', $feature->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this feature?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
