@extends('backend.layouts.main')

@section('content')
<div>
    <a class="btn btn-primary mb-3" href="{{ route('contacts.index') }}">Back Client List</a>
</div>
<div class="p-4">
    <h4>Contact Details</h4>
    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Subject:</strong> {{ $contact->subject }}</p>
    <p><strong>Message:</strong> {{ $contact->message }}</p>
    <p><strong>Status:</strong> {{ $contact->status == 'replied' ? 'Seen' : 'Pending' }}</p>
</div>
@endsection
