<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;

class contaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();
        return view('admin.contact.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.show', compact('contact'));
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);

        if(!is_null($contact)){
            $contact->delete();
        }

        $notify = array('messege' => 'Contact info deleted successfully!!','alert-type' => 'success');
        return back()->with($notify);
    }
}
