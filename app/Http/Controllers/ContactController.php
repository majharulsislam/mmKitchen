<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;
use Toastr;

class ContactController extends Controller
{
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ],
            [
                'name.required' => 'Enter your name',
                'email.required' => 'Enter your email',
                'subject.required' => 'Write your subject',
                'message.required' => 'Write your message',
            ]
        );

        $contact = new Contact();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        Toastr::success('Your Contact Info Send Successfully!', 'Contact', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

}
