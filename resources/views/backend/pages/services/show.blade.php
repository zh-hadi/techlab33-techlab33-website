@extends('backend.layouts.main')

@section('content')
<div class="p-4 bg-white">
    <h4>Service Category Details</h4>

    <div class="row">
        <div class="col-md-6">
            <p><strong>Name:</strong> {{ $service->name }}</p>
            <p><strong>Description:</strong> {{ $service->description }}</p>
            <p><strong>Icon:</strong> <i class="{{ $service->icon }}"></i> ({{ $service->icon }})</p>
        </div>
        <div class="col-md-6">
            <p><strong>Content:</strong></p>
            <div>{!! $service->content !!}</div>
        </div>
        <div class="col-md-12 mt-3">
            <p><strong>Image:</strong></p>
            @if($service->image)
                <img src="{{ image($service->image) }}" alt="Service Image" class="img-fluid" style="max-height: 300px;">
            @else
                <p>No image available.</p>
            @endif
        </div>
    </div>

    <a href="{{ route('services.index') }}" class="btn btn-secondary mt-4">Back</a>
</div>
@endsection
