<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactFormSubmission;

class PageController extends Controller
{

    /**
     * Display home page.
     * 
     * @return View
     */
    public function index(): View
    {
        return view('page.index', ['adminEmail' => config('mail.adminEmail')]);
    }
    
    /**
     * Validate and email the contact form submission.
     * 
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function submitContactForm(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        Notification::route('mail', config('mail.adminEmail'))
                ->notify(new ContactFormSubmission((object)$request->all()));
        return response()->json(['message' => 'Thank you for contacting us. We will respond to you as soon as possible.']);
    }
}
