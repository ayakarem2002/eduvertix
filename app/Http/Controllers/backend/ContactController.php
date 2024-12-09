<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('backend.contacts.index', compact('contacts'));
    }
    

    public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'fullname' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'topic' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    // Save the data to the database
    Contact::create([
        'fullname' => $request->fullname,
        'email' => $request->email,
        'topic' => $request->topic,
        'message' => $request->message,
    ]);

    // Redirect back with a success message
    return redirect()->back()->with('success', 'تم إرسال رسالتك بنجاح!');
}

    

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('backend.contacts.index')->with('success', 'Contact message deleted successfully.');
    }
}
