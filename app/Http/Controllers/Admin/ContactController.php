<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('backend.pages.contact.index', [
            'contacts' => $contacts
        ]);
        abort(404);
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
        $attributes = $request->validated();


        $contact = Contact::create($attributes);

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
            'contact' => $contact
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
