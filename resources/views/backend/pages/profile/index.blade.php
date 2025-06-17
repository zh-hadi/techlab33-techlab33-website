@extends('backend.layouts.main')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal">
        <i class="fas fa-edit fa-sm text-white-50"></i> Edit Profile
    </a>

</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                @if($user->image)
                    <img src="{{ asset('storage/'. $user->image) }}" alt="User Image" class="img-fluid rounded">
                @else
                    <img src="{{ asset('default-user.png') }}" alt="Default Image" class="img-fluid rounded">
                @endif
            </div>
            <div class="col-md-9">
                <h4>Name: {{ $user->name }}</h4>
                <p>Email: {{ $user->email }}</p>
                <!-- Add more fields if needed -->
            </div>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <!-- Name -->
          <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
          </div>

          {{-- <!-- Email -->
          <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
          </div>

          <!-- Password -->
          <div class="form-group">
              <label>Password (optional)</label>
              <input type="password" name="password" class="form-control">
          </div> --}}

          <!-- Image -->
          <div class="form-group">
              <label>Profile Image</label>
              @if($user->image)
                  <img src="{{ asset('storage/'. $user->image) }}" width="100" class="mb-2 d-block">
              @endif
              <input type="file" name="image" class="form-control-file">
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>


@endsection
