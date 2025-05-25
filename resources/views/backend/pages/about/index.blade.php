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



    @include('backend.pages.about.testimonials.index')


    @include('backend.pages.about.business_partner.index')
@endsection


