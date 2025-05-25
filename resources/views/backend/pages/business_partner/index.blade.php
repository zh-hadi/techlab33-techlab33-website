@extends('backend.layouts.main')

@section('content')

<div>
    <div class="p-2 text-center font-weight-bolder" style="background-color: #4e73df">
        <div class="text-white">Business Partners Manage</div>
    </div>

    <div class="p-4 bg-white">
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#business_partner_modal">Add Business Partner</button>

        <div class="table-responsive">
            <table class="table table-bordered" id="business_partner_dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Logo</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($businessPartners as $key => $partner)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $partner->name }}</td>
                        <td>
                            @if($partner->logo)
                                <img src="{{ image($partner->logo) }}" alt="logo" width="60">
                            @endif
                        </td>
                        <td>
                            <span class="badge badge-{{ $partner->status === 'active' ? 'success' : 'secondary' }}">
                                {{ ucfirst($partner->status) }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#business_partner_editModal{{ $partner->id }}">Edit</button>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#business_partner_deleteModal{{ $partner->id }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Edit + Delete Modals --}}
            @foreach($businessPartners as $partner)
            <!-- Edit Modal -->
            <div class="modal fade" id="business_partner_editModal{{ $partner->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg bg-white" role="document">
                    <form action="{{ route('business-partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data" class="modal-content">
                        @csrf @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Business Partner</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
                        </div>
                        <div class="modal-body row">
                            @include('backend.pages.business_partner.edit_form', ['partner' => $partner])
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="modal fade" id="business_partner_deleteModal{{ $partner->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog bg-white" role="document">
                    <form method="POST" action="{{ route('business-partners.destroy', $partner->id) }}" class="modal-content">
                        @csrf @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title">Confirm Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this partner?
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
    <div class="modal fade" id="business_partner_modal" tabindex="-1" role="dialog" aria-hidden="true">
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
            <form action="{{ route('business-partners.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Business Partner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
                </div>
                <div class="modal-body row">
                    @include('backend.pages.business_partner.create_form')
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection