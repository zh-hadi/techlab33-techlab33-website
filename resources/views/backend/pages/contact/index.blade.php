@extends('backend.layouts.main')

@section('content')

<div>
    <div class="p-2 text-center font-weight-bolder" style="background-color: #4e73df">
        <div class="text-white">Contact Manage</div>
    </div>

    <div class="p-4 bg-white">
        <div class="table-responsive">
            <table class="table table-bordered" id="contact_dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $key => $contact)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>
                            @if($contact->status === 'replied')
                                <span class="badge badge-success">Replied</span>
                            @else
                                <span class="badge badge-warning">Not replied</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-info">Show</a>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
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
