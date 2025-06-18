<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();

        return view('backend.pages.contact.index', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * Show the form for creating the resource.
     */
    public function create(): never
    {
        abort(404);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        // request()->validate([
        //     'g-recaptcha-response' => 'required',
        // ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => request()->input('g-recaptcha-response'),
            'remoteip' => request()->ip(),
        ]);

        if (! $response->json('success')) {
            return 'reCAPTCHA failed. Are you a robot?';
        }

        $attributes = $request->validated();

        $contact = Contact::create($attributes);

        // Send email
        Mail::to('info@techlab33.com')->send(new ContactMail($attributes)); // or $contact->toArray()

        if ($request->ajax()) {
            return response('OK', 200);
        }
        //  if ($contact->ajax()) {
        //     return response('OK', 200);
        // }

        // return redirect()->back()->with('success', 'Contact form submitted successfully.');

    }

    /**
     * Display the resource.
     */
    public function show(Contact $contact)
    {
        return view('backend.pages.contact.show', [
            'contact' => $contact,
        ]);
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact info deleted Successfully');
    }
}
