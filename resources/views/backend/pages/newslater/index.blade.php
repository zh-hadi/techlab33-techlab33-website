@extends('backend.layouts.main')

@section('content')
<div class="p-4 bg-white">
    <h4>Send Newsletter</h4>

    {{-- Show validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Show success message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('newslaters.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="subject">Subject <span class="text-danger">*</span></label>
            <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" required>
        </div>

        <div class="form-group">
            <label for="body">Email Body <span class="text-danger">*</span></label>
            <textarea name="body" class="ckeditor form-control" rows="6" required>{{ old('body') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>
@endsection
