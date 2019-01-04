<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewEnquiry;


class ContactController extends Controller
{

    public function contact()
    {
        
        return view('admin.auth.contact');
    }

    
    
    public function submitForm(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
        Contact::create(['name' => $name, 'email' => $email, 'message' => $message]);
        Notification::route('mail', 's.nasim@hotmail.co.uk')
                ->notify(new NewEnquiry((object) $request->all()));

        return response('Message sent!');
    }
}
