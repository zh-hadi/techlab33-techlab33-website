@extends('backend.layouts.main')

@section('content')

<div>


       <div>
        <div class="p-2 text-center font-weight-bolder" style="background-color: #4e73df">
            <div class="text-white">Testimonials Manage</div>
        </div>

        <div class="p-4 bg-white">
            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Add Testimonial</button>

             <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Profession</th>
                            <th>Image</th>
                            <th>Comment</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonials as $key => $testimonial)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $testimonial->name }}</td>
                            <td>{{ $testimonial->profession }}</td>
                            <td>
                                @if($testimonial->image)
                                    <img src="{{  image($testimonial->image) }}" alt="image" width="60">
                                @endif
                            </td>
                            <td>{{ Str::limit($testimonial->comment, 50) }}</td>
                            <td>{{ $testimonial->rating }}/5</td>
                            <td>
                                <span class="badge badge-{{ $testimonial->status == 'active' ? 'success' : 'secondary' }}">
                                    {{ $testimonial->status == 'active' ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editModal{{ $testimonial->id }}">Edit</button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $testimonial->id }}">Delete</button>
                            </td>
                        </tr>

                       

                        @endforeach
                    </tbody>
                </table>
                @foreach($testimonials as $testimonial)
<!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $testimonial->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg bg-white" role="document">
        <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Testimonial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row">
                @include('backend.pages.testimonials.edit_form', ['testimonial' => $testimonial])
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal{{ $testimonial->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog bg-white" role="document">
        <form method="POST" action="{{ route('testimonials.destroy', $testimonial->id) }}" class="modal-content">
            @csrf
            @method('DELETE')

            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                Are you sure you want to delete this testimonial?
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

        <!-- Add Modal -->
        <div class="modal  fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                @if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
                <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Testimonial</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row">
                        @include('backend.pages.testimonials.create_form')
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</div>
</div>

@endsection