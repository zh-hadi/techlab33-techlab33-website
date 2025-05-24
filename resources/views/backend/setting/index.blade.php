@extends('backend.layouts.main')

@section('content')
<div class="container">
    <h2>Edit Setting</h2>
    <hr>

    <form action="{{ route('settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Website Name --}}
        <div class="form-group row">
            <label for="website_name" class="col-sm-2 col-form-label">Website Name</label>
            <div class="col-sm-10">
                <input type="text" name="website_name" class="form-control" id="website_name" value="{{ old('website_name', $setting->website_name) }}">
            </div>
        </div>

        {{-- Website Email --}}
        <div class="form-group row">
            <label for="website_email" class="col-sm-2 col-form-label">Website Email</label>
            <div class="col-sm-10">
                <input type="email" name="website_email" class="form-control" id="website_email" value="{{ old('website_email', $setting->website_email) }}">
            </div>
        </div>

        {{-- Website Logo --}}
        <div class="form-group row">
            <label for="website_logo" class="col-sm-2 col-form-label">Website Logo</label>
            <div class="col-sm-10">
                <input type="file" name="website_logo" class="form-control-file" id="website_logo">
                @if($setting->website_logo)
                    <img src="{{ asset('storage/'.$setting->website_logo) }}" alt="Logo" height="50">
                @endif
            </div>
        </div>

        {{-- Website Favicon --}}
        <div class="form-group row">
            <label for="website_favicon" class="col-sm-2 col-form-label">Website Favicon</label>
            <div class="col-sm-10">
                <input type="file" name="website_favicon" class="form-control-file" id="website_favicon">
                @if($setting->website_favicon)
                    <img src="{{ asset('storage/'.$setting->website_favicon) }}" alt="Favicon" height="30">
                @endif
            </div>
        </div>

        {{-- Address --}}
        <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input type="text" name="address" class="form-control" id="address" value="{{ old('address', $setting->address) }}">
            </div>
        </div>

        {{-- Phone --}}
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone', $setting->phone) }}">
            </div>
        </div>

        {{-- Telephone --}}
        <div class="form-group row">
            <label for="telephone" class="col-sm-2 col-form-label">Telephone</label>
            <div class="col-sm-10">
                <input type="text" name="telephone" class="form-control" id="telephone" value="{{ old('telephone', $setting->telephone) }}">
            </div>
        </div>

        {{-- Hotline Number --}}
        <div class="form-group row">
            <label for="hotline_number" class="col-sm-2 col-form-label">Hotline Number</label>
            <div class="col-sm-10">
                <input type="text" name="hotline_number" class="form-control" id="hotline_number" value="{{ old('hotline_number', $setting->hotline_number) }}">
            </div>
        </div>

        {{-- Facebook Link --}}
        <div class="form-group row">
            <label for="facebook_link" class="col-sm-2 col-form-label">Facebook</label>
            <div class="col-sm-10">
                <input type="url" name="facebook_link" class="form-control" id="facebook_link" value="{{ old('facebook_link', $setting->facebook_link) }}">
            </div>
        </div>

        {{-- LinkedIn Link --}}
        <div class="form-group row">
            <label for="linkedin_link" class="col-sm-2 col-form-label">LinkedIn</label>
            <div class="col-sm-10">
                <input type="url" name="linkedin_link" class="form-control" id="linkedin_link" value="{{ old('linkedin_link', $setting->linkedin_link) }}">
            </div>
        </div>

        {{-- X (Twitter) Link --}}
        <div class="form-group row">
            <label for="x_link" class="col-sm-2 col-form-label">X (Twitter)</label>
            <div class="col-sm-10">
                <input type="url" name="x_link" class="form-control" id="x_link" value="{{ old('x_link', $setting->x_link) }}">
            </div>
        </div>

        {{-- Instagram Link --}}
        <div class="form-group row">
            <label for="instagram_link" class="col-sm-2 col-form-label">Instagram</label>
            <div class="col-sm-10">
                <input type="url" name="instagram_link" class="form-control" id="instagram_link" value="{{ old('instagram_link', $setting->instagram_link) }}">
            </div>
        </div>

        {{-- Google Map Location --}}
        <div class="form-group row">
            <label for="google_map_location" class="col-sm-2 col-form-label">Google Map</label>
            <div class="col-sm-10">
                <input type="text" name="google_map_location" class="form-control" id="google_map_location" value="{{ old('google_map_location', $setting->google_map_location) }}">
            </div>
        </div>

        {{-- Submit and Back Button --}}
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Update</button>
                {{-- <a href="{{ route('settings.index') }}" class="btn btn-secondary">Back</a> --}}
            </div>
        </div>
    </form>
</div>
@endsection
