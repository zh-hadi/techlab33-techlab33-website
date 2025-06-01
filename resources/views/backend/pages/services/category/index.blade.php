@extends('backend.layouts.main')

@section('content')

<div>
    <div class="p-2 text-center font-weight-bolder" style="background-color: #4e73df">
        <div class="text-white">Service Category Manage</div>
    </div>

    <div class="p-4 bg-white">
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#service_category_add_modal">Add Service Category</button>

        <div class="table-responsive">
            <table class="table table-bordered" id="service_category_dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Icon</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($serviceCategories as $key => $serviceCategory)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $serviceCategory->name }}</td>
                        <td>{{ $serviceCategory->description }}</td>
                        <td>{{ $serviceCategory->icon }}</td>
                        <td>{{ $serviceCategory->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#service_category_edit_modal{{ $serviceCategory->id }}">Edit</button>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#service_category_delete_modal{{ $serviceCategory->id }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Edit + Delete Modals --}}
            @foreach($serviceCategories as $serviceCategory)
            <!-- Edit Modal -->
            <div class="modal fade" id="service_category_edit_modal{{ $serviceCategory->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <form action="{{ route('service-categories.update', $serviceCategory->id) }}" method="POST" class="modal-content">
                        @csrf @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Service Category</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body row">
                            @include('backend.pages.services.category.edit_form', ['serviceCategory' => $serviceCategory])
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="modal fade" id="service_category_delete_modal{{ $serviceCategory->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('service-categories.destroy', $serviceCategory->id) }}" method="POST" class="modal-content">
                        @csrf @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Service Category</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this service category?
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
    <div class="modal fade" id="service_category_add_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('service-categories.store') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Service Category</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body row">
                    @include('backend.pages.services.category.create_form')
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
