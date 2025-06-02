@extends('backend.layouts.main')

@section('content')

<div>
    <div class="p-2 text-center font-weight-bolder" style="background-color: #4e73df">
        <div class="text-white">Email Manage</div>
    </div>

    <div class="p-4 bg-white">
        {{-- <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#email_add_modal">Add Email</button> --}}

        <div class="table-responsive">
            <table class="table table-bordered" id="email_dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($emails as $key => $email)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $email->email }}</td>
                        <td>
                            <span class="badge badge-{{ $email->status == 1 ? 'success' : 'secondary' }}">
                                {{  $email->status == 1 ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#email_edit_modal{{ $email->id }}">Edit</button>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#email_delete_modal{{ $email->id }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Edit + Delete Modals --}}
            @foreach($emails as $email)
            <!-- Edit Modal -->
            <div class="modal fade" id="email_edit_modal{{ $email->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <form action="{{ route('subscribes.update', $email->id) }}" method="POST" class="modal-content">
                        @csrf @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Email</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body row">
                            @include('backend.pages.subscribe.edit_form', ['emailItem' => $email])
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="modal fade" id="email_delete_modal{{ $email->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('subscribes.destroy', $email->id) }}" method="POST" class="modal-content">
                        @csrf @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Email</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this email?
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>


</div>

@endsection
