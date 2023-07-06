<?php

namespace App\Http\Controllers\Contact;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Index
    public function index(Request $request)
    {
        return view('front.pages.contact.index');
    }

    // Send
    public function send(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'subject' => 'required',
            'message' => 'required'
        ];

        $messages = [
            'name.required' => 'Le nom est requis.',
            'email.required' => 'L\'adresse e-mail est requise.',
            'email.email' => 'L\'adresse e-mail doit être valide.',
            'phone.required' => 'Le numéro de téléphone est requis.',
            'phone.regex' => 'Le numéro de téléphone n\'est pas valide.',
            'phone.min' => 'Le numéro de téléphone doit avoir au moins 11 caractères.',
            'subject.required' => 'Le sujet est requis.',
            'message.required' => 'Le message est requis.'
        ];

        $this->validate($request, $rules, $messages);

        try {
            // Store data in database
            Contact::create($request->all());

            // Send mail to admin
            Mail::send('mail', [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'subject' => $request->get('subject'),
                'user_query' => $request->get('message'),
            ], function ($message) use ($request) {
                $message->from($request->email)
                        ->to('contact@LaravelStarter.com', 'Admin')
                        ->subject($request->get('subject'));
            });

            return back()->with('success', 'Nous avons reçu votre message. Merci !');
        } catch (\Exception $e) {
            // Handle exception
            return back()->with('error', 'Une erreur est survenue lors de l\'envoi du message. Veuillez vérifier vos informations et réessayer.');
        }
    }
}
