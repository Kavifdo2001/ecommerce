<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactFormController extends Controller
{
    public function sendContactForm(Request $request)
    {
        $mailto = 'kavinduf774@gail.com';

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:1000',
        ]);


        Mail::to($mailto)->send(new ContactFormMail($data));


        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}

