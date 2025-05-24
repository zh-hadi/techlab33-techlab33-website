@extends('backend.layouts.main')

@section('content')
<div class="p-2 text-center font-weight-bolder" style="background-color: #4e73df">
    <div class="text-white">About Page Content Manage</div>
</div>
<div class="border p-4 bg-white">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>There were some problems with your input:</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('abouts.update', $about->id ?? '') }}" method="POST">
        @csrf
        @if(isset($about)) @method('PUT') @endif

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" value="{{ old('title', $about->title ?? '') }}" placeholder="Enter title">
            </div>
        </div>

        <div class="form-group row mt-3">
            <label class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea name="content" class="form-control" rows="5" placeholder="Enter content">{{ old('content', $about->content ?? '') }}</textarea>
            </div>
        </div>

        <div class="form-group row mt-3">
            <label class="col-sm-2 col-form-label">Video URL</label>
            <div class="col-sm-10">
                <input type="url" name="video_url" class="form-control" value="{{ old('video_url', $about->video_url ?? '') }}" placeholder="YouTube or Vimeo link">
            </div>
        </div>

        <div class="form-group row mt-3">
            <label class="col-sm-2 col-form-label">Clients</label>
            <div class="col-sm-10">
                <input type="number" name="clients" class="form-control" value="{{ old('clients', $about->clients ?? '') }}" placeholder="e.g. 500">
            </div>
        </div>

        <div class="form-group row mt-3">
            <label class="col-sm-2 col-form-label">Projects</label>
            <div class="col-sm-10">
                <input type="number" name="projects" class="form-control" value="{{ old('projects', $about->projects ?? '') }}" placeholder="e.g. 150">
            </div>
        </div>

        <div class="form-group row mt-3">
            <label class="col-sm-2 col-form-label">Hours of Support</label>
            <div class="col-sm-10">
                <input type="number" name="hoursofsupport" class="form-control" value="{{ old('hoursofsupport', $about->hoursofsupport ?? '') }}" placeholder="e.g. 2400">
            </div>
        </div>

        <div class="form-group row mt-3">
            <label class="col-sm-2 col-form-label">Workers</label>
            <div class="col-sm-10">
                <input type="number" name="workers" class="form-control" value="{{ old('workers', $about->workers ?? '') }}" placeholder="e.g. 25">
            </div>
        </div>

        <div class="form-group row mt-4">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">{{ isset($about) ? 'Update' : 'Create' }}</button>
            </div>
        </div>
    </form>

    <div>
        <div class="p-2 text-center font-weight-bolder" style="background-color: #4e73df">
            <div class="text-white">Testimonials Manage</div>
        </div>

        <div class="p-4 bg-white">
            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Add Testimonial</button>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="thead-light">
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
                                    <img src="{{ asset('uploads/testimonials/'.$testimonial->image) }}" alt="image" width="60">
                                @endif
                            </td>
                            <td>{{ Str::limit($testimonial->comment, 50) }}</td>
                            <td>{{ $testimonial->rating }}/5</td>
                            <td>
                                <span class="badge badge-{{ $testimonial->status ? 'success' : 'secondary' }}">
                                    {{ $testimonial->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editModal{{ $testimonial->id }}">Edit</button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $testimonial->id }}">Delete</button>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade " id="editModal{{ $testimonial->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                        @include('backend.pages.about.testimonials._form', ['testimonial' => $testimonial])
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Delete Modal -->
                        <div class="modal fade " id="deleteModal{{ $testimonial->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog bg-white" role="document">
                                <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" class="modal-content">
                                    @csrf @method('DELETE')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Confirm Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
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
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add Modal -->
        <div class="modal  fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Testimonial</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row">
                        @include('backend.pages.about.testimonials._form')
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
