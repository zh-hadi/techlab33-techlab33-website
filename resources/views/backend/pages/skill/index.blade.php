@extends('backend.layouts.main')

@section('content')

<div>
    <div class="p-2 text-center font-weight-bolder" style="background-color: #4e73df">
        <div class="text-white">Skills Manage</div>
    </div>

    <div class="p-4 bg-white">
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#skill_add_modal">Add Skill</button>

        <div class="table-responsive">
            <table class="table table-bordered" id="skill_dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Percentage</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skills as $key => $skill)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $skill->name }}</td>
                        <td>{{ $skill->percentage }}%</td>
                        <td>
                            <span class="badge badge-{{ $skill->status === 'active' ? 'success' : 'secondary' }}">
                                {{ ucfirst($skill->status) }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#skill_edit_modal{{ $skill->id }}">Edit</button>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#skill_delete_modal{{ $skill->id }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Edit + Delete Modals --}}
            @foreach($skills as $skill)
            <!-- Edit Modal -->
            <div class="modal fade" id="skill_edit_modal{{ $skill->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <form action="{{ route('skills.update', $skill->id) }}" method="POST" class="modal-content">
                        @csrf @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Skill</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body row">
                            @include('backend.pages.skill.edit_form', ['skill' => $skill])
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="modal fade" id="skill_delete_modal{{ $skill->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" class="modal-content">
                        @csrf @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Skill</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this skill?
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
    <div class="modal fade" id="skill_add_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('skills.store') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Skill</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body row">
                    @include('backend.pages.skill.create_form')
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
